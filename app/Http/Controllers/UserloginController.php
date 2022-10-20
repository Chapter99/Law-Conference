<?php

namespace App\Http\Controllers;

use PDF;
use Auth;
use Validator;
use App\Models\User;
use App\Models\Paper;
use App\Models\Travel;
use App\Models\Payment;
use Illuminate\Http\Request;

class UserloginController extends Controller
{
    public function index(Request $request){
        $user_id = Auth::user()->id;
        $papers = Paper::where('user_id', $user_id)->get();
        $request->session()->put('paper_count', count($papers));
        $payments = Payment::where('user_id', $user_id)->get();

        return view('users.pages.home')
            ->with(compact('papers'))
            ->with(compact('payments'));
    }

    public function payment(){
        $user_id = Auth::user()->id;
        $payments = Payment::where('user_id', $user_id)->get();
        return view('users.pages.payment')->with(compact('payments'));
    }

    public function profile(){
        return view('users.pages.profile');
    }

    public function profile_edit(){
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        return view('users.pages.profile_edit')
            ->with(compact('user'));
    }

    public function profile_update(Request $request){
        $rule = [
            'title' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'address' => 'required',
            'province' => 'required',
            'postcode' => 'required',
            'tel' => 'required',
            'register_type' => 'required',
            'present' => 'required',
        ];

        if($request->register_type == 3){
            $rule['partner'] = 'required';
        }

        if($request->register_type == 4){
            $rule['org'] = 'required';
        }

        $message = [
            'required' => 'ฟิลด์นี้จำเป็น'
        ];
        $validator = Validator::make($request->all(), $rule, $message);

        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->with(compact('user'));
        }else{
            $user_data = array (
                'title' => $request->title,
                'academic' => $request->academic,
                'fname' => $request->fname,
                'lname' => $request->lname,
                'address' => $request->address,
                'province' => $request->province,
                'postcode' => $request->postcode,
                'tel' => $request->tel,
                'register_type' => $request->register_type,
                'partner' => $request->has('partner') ? $request->partner : null,
                'org' => $request->has('org') ? $request->org : null,
                'present' => $request->present,
                'update_at' => NOW()
            );

            $user->update($user_data);
            return redirect()->route('users.profile')->with('success', 'ปรับปรุงเรียบร้อย');
        }
    }

    public function payment_store(Request $request){
        $rule = [
            'amount' => 'required',
            'tdate' => 'required',
            'filename' => 'required|mimes:pdf,jpeg,png|max:30240',
        ];
        $message = [
            'required' => 'ฟิลด์นี้จำเป็น',
            'mimes' => 'ชนิดไฟล์ ไม่ถูกต้อง',
            'max' => 'ขนาดไฟล์ใหญ่กว่าที่กำหนด'
        ];
        $validator = Validator::make($request->all(), $rule, $message);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $fileName = $request->user_id.'_'.time().'.'.$request->filename->getClientOriginalExtension();
            $filePath = $request->file('filename')->storeAs('public/payment', $fileName);

            $payment_data = array (
                'user_id' => $request->user_id,
                'amount' => $request->amount,
                'tdate' => $request->tdate,
                'filename' => $fileName,
                'pay_status' => 1,
                'create_at' => NOW(),
                'update_at' => NOW()
            );
            Payment::create($payment_data);
            return redirect()->route('users.home')->with('success', 'แจ้งชำระเงินเรียบร้อย');
        }
    }

    public function pdf_accepted($id){
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $paper = Paper::find($id);
        $pdf = PDF::loadView('users.pages.accepted', ['user' => $user, 'paper' => $paper]);
        return $pdf->stream();
    }

    public function pdf_accepted_full($id){
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $paper = Paper::find($id);
        $pdf = PDF::loadView('users.pages.accepted_full', ['user' => $user, 'paper' => $paper]);
        return $pdf->stream();
    }

    public function payment_edit(){
        $user_id = Auth::user()->id;
        $payment = Payment::where('user_id', $user_id)->first();
        return view('users.pages.payment_edit')->with(compact('payment'));
    }

    public function payment_update(Request $request){
        $rule = [
            'amount' => 'required',
            'tdate' => 'required',
            'filename' => 'mimes:pdf,jpeg,png|max:30240',
        ];
        $message = [
            'required' => 'ฟิลด์นี้จำเป็น',
            'mimes' => 'ชนิดไฟล์ ไม่ถูกต้อง',
            'max' => 'ขนาดไฟล์ใหญ่กว่าที่กำหนด'
        ];
        $validator = Validator::make($request->all(), $rule, $message);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $payment_data = array (
                'amount' => $request->amount,
                'tdate' => $request->tdate,
                'update_at' => NOW()
            );
            if($request->hasFile('filename')){
                $fileName = $request->user_id.'_'.time().'.'.$request->filename->getClientOriginalExtension();
                $filePath = $request->file('filename')->storeAs('public/payment', $fileName);
                $payment_data['filename'] = $fileName;
            }
            Payment::find($request->id)->update($payment_data);
            return redirect()->route('users.home')->with('success', 'แก้ไขการแจ้งชำระเงินเรียบร้อย');
        }
    }

    public function receiptData(){
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        return view('users.pages.receiptData')->with(compact('user'));
    }

    public function receiptDataSave(Request $request){
        $rule = [
            'fullname' => 'required',
            'address' => 'required',
            'province' => 'required',
            'postcode' => 'required',
        ];
        $message = [
            'required' => 'ฟิลด์นี้จำเป็น',
        ];
        $validator = Validator::make($request->all(), $rule, $message);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $receipt_data = array (
                'fullname' => $request->fullname,
                'address' => $request->address,
                'province' => $request->province,
                'postcode' => $request->postcode,
                'update_at' => NOW()
            );

            User::find($request->user_id)->update($receipt_data);
            return redirect()->route('users.receiptData')->with('success', 'ปรับปรุงข้อมูลการออกใบเสร็จรับเงินเรียบร้อย');
        }
    }

}
