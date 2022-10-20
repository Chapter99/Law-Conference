<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use App\Models\Paper;
use App\Models\Payment;
use App\Models\Topic;
use App\Mail\AcceptedMail;
use Illuminate\Support\Facades\Mail;

class BackendController extends Controller
{
    public function home(){
        $num_all = User::all()->count();
        // $num_present = User::where('present', 1)->count();
        $num_hasPaper = User::has('papers')->count();
        // $num_tsu = Paper::where('confirm', 1)->whereHas('user', function ($q){
        //     return $q->where('join_type', 1);
        // })->count();
        // $num_other = Paper::where('confirm', 1)->whereHas('user', function ($q){
        //      return $q->where('join_type', 2);
        // })->count();
        $data = [
            'num_all' => $num_all,
            'num_hasPaper' => $num_hasPaper,
        ];
        $stats = [];
        $abs_oral = 0; $abs_poster = 0; $full_oral = 0; $full_poster = 0; $jnl_oral = 0; $jnl_poster = 0; $sums = 0;
        // for($i=1;$i<12;$i++){
        //     $topic = Topic::find($i)->name;
        //     $papers_abs_oral = Paper::where('topic', $i)->where('publish', 1)->where('present', 'Oral')->where('confirm', 1)->count();
        //     $papers_abs_poster = Paper::where('topic', $i)->where('publish', 1)->where('present', 'Poster')->where('confirm', 1)->count();
        //     $papers_full_oral = Paper::where('topic', $i)->where('publish', 2)->where('present', 'Oral')->where('confirm', 1)->count();
        //     $papers_full_poster = Paper::where('topic', $i)->where('publish', 2)->where('present', 'Poster')->where('confirm', 1)->count();
        //     $papers_jnl_oral = Paper::where('topic', $i)->where('publish', 3)->where('present', 'Oral')->where('confirm', 1)->count();
        //     $papers_jnl_poster = Paper::where('topic', $i)->where('publish', 3)->where('present', 'Poster')->where('confirm', 1)->count();
        //     $sum = $papers_abs_oral + $papers_abs_poster + $papers_full_oral + $papers_full_poster + $papers_jnl_oral + $papers_jnl_poster;
        //     $stats[$i] = [
        //         'topic' => $topic,
        //         'abs_oral' => $papers_abs_oral,
        //         'abs_poster' => $papers_abs_poster,
        //         'full_oral' => $papers_full_oral,
        //         'full_poster' => $papers_full_poster,
        //         'jnl_oral' => $papers_jnl_oral,
        //         'jnl_poster' => $papers_jnl_poster,
        //         'sum' => $sum
        //     ];
        //     $abs_oral += $papers_abs_oral;
        //     $abs_poster += $papers_abs_poster;
        //     $full_oral += $papers_full_oral;
        //     $full_poster += $papers_full_poster;
        //     $jnl_oral += $papers_jnl_oral;
        //     $jnl_poster += $papers_jnl_poster;
        //     $sums += $sum;
        // }
        // $stats[12] = [
        //     'abs_oral' => $abs_oral,
        //     'abs_poster' => $abs_poster,
        //     'full_oral' => $full_oral,
        //     'full_poster' => $full_poster,
        //     'jnl_oral' => $jnl_oral,
        //     'jnl_poster' => $jnl_poster,
        //     'sum' => $sums
        // ];
        //dd($data);
        return view('backend.pages.home')
            ->with(compact('data'))
            ->with(compact('stats'));
    }

    public function presentlist(){
        $users = User::where('status', 1)->get();
        return view('backend.pages.presentlist')->with(compact('users'));
    }

    public function participantlist(){
        $users = User::where('status', 1)->where('present', 0)->get();
        return view('backend.pages.participantlist')->with(compact('users'));
    }

    public function userprofile($id){
        $user = User::find($id);
        return view('backend.pages.userprofile')->with(compact('user'));
    }

    public function paperlist(Request $request){
        if($request->topic == ""){
            $papers = Paper::all();
            $selected = 0;
        }else{
            $papers = Paper::where('topic', $request->topic)->get();
            $selected = $request->topic;
        }
        $topics = Topic::all();
        return view('backend.pages.paperlist')
        ->with(compact('papers'))
        ->with(compact('topics'))
        ->with('selected', $selected);
    }

    public function paperdetail($id){
        $paper = Paper::find($id);
        return view('backend.pages.paperdetail')->with(compact('paper'));
    }

    public function paymentlist(){
        $payments = Payment::all();
        return view('backend.pages.paymentlist')->with(compact('payments'));
    }

    public function resultabs($id){
        // $paper = Paper::whereHas('reviewer_abs', function($q) use ($id){
        //     $q->where('paper_id', $id);
        // })->get();
        $paper = Paper::find($id);
        return view('backend.pages.resultabs')
            ->with(compact('paper'));
    }

    public function resultabs_save(Request $request, $id){
        $result_data = array (
            'paper_status' => 2,
            'result' => $request->result,
            'update_at' => NOW()
        );

        $paper = Paper::find($id);
        $paper->update($result_data);

        foreach($paper->reviewer_abs as $reviewer){
            Paper::find($id)->reviewer_abs()->updateExistingPivot($reviewer->pivot->rev_id, ['approve' => 1]);
        }

        // sent email
        $user = User::find($paper->user_id);
        $email = $user->email;
        Mail::to($email)->send(new AcceptedMail($user, $paper));
        return redirect()->route('backend.paperlist')->with('success', 'ส่งเมลแจ้งผลการประเมินบทคัดย่อเรียบร้อยแล้ว');
    }

    public function resultfull($id){
        $paper = Paper::find($id);
        return view('backend.pages.resultfull')
            ->with(compact('paper'));
    }

    public function resultfull_save(Request $request, $id){
        $result_data = array (
            'paper_status' => 2,
            'result' => $request->result,
            'update_at' => NOW()
        );

        $paper = Paper::find($id);
        $paper->update($result_data);

        foreach($paper->reviewer_full as $reviewer){
            Paper::find($id)->reviewer_full()->updateExistingPivot($reviewer->pivot->rev_id, ['approve' => 1]);
        }

        // sent email
        $user = User::find($paper->user_id);
        $email = $user->email;
        Mail::to($email)->send(new AcceptedMail($user, $paper));
        return redirect()->route('backend.paperlist')->with('success', 'ส่งเมลแจ้งผลการประเมินบทความฉบับเต็มเรียบร้อยแล้ว');
    }

    public function resultposter($id){
        $paper = Paper::find($id);
        return view('backend.pages.resultposter')
            ->with(compact('paper'));
    }

    public function resultposter_save(Request $request, $id){
        $result_data = array (
            'paper_status' => 2,
            'result' => $request->result,
            'update_at' => NOW()
        );

        $paper = Paper::find($id);
        $paper->update($result_data);

        foreach($paper->reviewer_poster as $reviewer){
            Paper::find($id)->reviewer_poster()->updateExistingPivot($reviewer->pivot->rev_id, ['approve' => 1]);
        }

        // sent email
        $user = User::find($paper->user_id);
        $email = $user->email;
        Mail::to($email)->send(new AcceptedMail($user, $paper));
        return redirect()->route('backend.paperlist')->with('success', 'ส่งเมลแจ้งผลการประเมิน Poster/Infographic เรียบร้อยแล้ว');
    }

    public function pay($id){
        $payment = Payment::find($id);
        return view('backend.pages.pay')
            ->with(compact('payment'));
    }

    public function pay_save(Request $request){
        $pay_data['amount'] = $request->amount;
        $pay_data['pay_status'] = $request->pay_status;
        $pay_data['comment'] = $request->comment;
        $payment = Payment::find($request->id)->update($pay_data);
        return redirect()->route('backend.paymentlist')->with('success', 'บันทึกสถานะการชำระเงินเรียบร้อยแล้ว');
    }

    public function addPayment($id){
        $payments = Payment::where('user_id', $id)->get();
        return view('backend.pages.addPayment')
            ->with(compact('payments'))
            ->with('id', $id);
    }

    public function AddPaymentSave(Request $request){
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
            return redirect()->route('backend.paymentlist')->with('success', 'แจ้งชำระเงินเรียบร้อย');
        }
    }

    public function receiptName(){
        $users = User::all();
        foreach($users as $user){
            if($user->academic == NULL){
                $title = $user->title;
            }else{
                $title = $user->academic;
            }
            $user_data['fullname'] = $title.$user->fname." ".$user->lname;
            User::find($user->id)->update($user_data);
        }
    }

    public function hasPoster($id, $poster){
        $paper = Paper::find($id)->update(['hasPoster' => $poster]);
        return redirect()->route('backend.paperlist')->with('success', 'ปรับปรุงข้อมูลแล้ว');
    }

    public function emailList(){
        $papers = Paper::where('present', 'Oral')->where('confirm', 1)->get();
        return view('backend.pages.emailList')->with(compact('papers'));
    }

}
