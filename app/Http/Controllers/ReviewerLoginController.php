<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reviewer;
use App\Models\Paper;
use Auth;
use App\Mail\ReviewerRejectMail;
use Illuminate\Support\Facades\Mail;
use PDF;
use Validator;

class ReviewerLoginController extends Controller
{
    public function index(){

        $full_paper = Paper::whereHas('reviewer_full', function($q){
            $reviewer_id = Auth::guard('reviewer')->user()->id;
            $q->where('rev_id', $reviewer_id);
        })->get();

        $abs_paper = Paper::whereHas('reviewer_abs', function($q){
            $reviewer_id = Auth::guard('reviewer')->user()->id;
            $q->where('rev_id', $reviewer_id);
        })->get();

        $poster_paper = Paper::whereHas('reviewer_poster', function($q){
            $reviewer_id = Auth::guard('reviewer')->user()->id;
            $q->where('rev_id', $reviewer_id);
        })->get();

        return view('reviewers.pages.home')
            ->with(compact('full_paper'))
            ->with(compact('abs_paper'))
            ->with(compact('poster_paper'));
    }

    public function review_abs($id){
        $paper = Paper::find($id);
        return view('reviewers.pages.review_abs')
            ->with(compact('paper'));
    }

    public function review_full($id){
        $paper = Paper::find($id);
        return view('reviewers.pages.review_full')
            ->with(compact('paper'));
    }

    public function review_poster($id){
        $paper = Paper::find($id);
        return view('reviewers.pages.review_poster')
            ->with(compact('paper'));
    }

    public function review_abs_save(Request $request, $id){
        $rule = [
            's11' => 'required',
            's21' => 'required',
            's22' => 'required',
            's23' => 'required',
            'result' => 'required',
            'filename' => 'nullable|mimes:doc,docx,pdf|max:30240',
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
            $reviewer_id = Auth::guard('reviewer')->user()->id;
            if($request->hasFile('filename')){
                $fileName = $id.'_'.time().'.'.$request->filename->getClientOriginalExtension();
                $request->file('filename')->storeAs('public/review', $fileName);
                Paper::find($id)->reviewer_abs()->updateExistingPivot($reviewer_id, [
                    's11' => $request->s11, 
                    's21' => $request->s21, 
                    's22' => $request->s22, 
                    's23' => $request->s23, 
                    'c11' => $request->c11, 
                    'c21' => $request->c21, 
                    'c22' => $request->c22, 
                    'c23' => $request->c23,
                    'comment' => $request->comment, 
                    'filename' => $fileName, 
                    'result' => $request->result
                ]);
            }else{
                Paper::find($id)->reviewer_abs()->updateExistingPivot($reviewer_id, [
                    's11' => $request->s11, 
                    's21' => $request->s21, 
                    's22' => $request->s22, 
                    's23' => $request->s23, 
                    'c11' => $request->c11, 
                    'c21' => $request->c21, 
                    'c22' => $request->c22, 
                    'c23' => $request->c23,
                    'comment' => $request->comment, 
                    'result' => $request->result
                ]);
            }
            return redirect()->route('reviewerlogin')->with('success', 'บันทึกการประเมินบทคัดย่อเรียบร้อยแล้ว');
        }
    }

    public function review_poster_save(Request $request, $id){
        $rule = [
            's11' => 'required',
            's21' => 'required',
            's22' => 'required',
            's23' => 'required',
            'result' => 'required',
            'filename' => 'nullable|mimes:doc,docx,pdf|max:30240',
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
            $reviewer_id = Auth::guard('reviewer')->user()->id;
            if($request->hasFile('filename')){
                $fileName = $id.'_'.time().'.'.$request->filename->getClientOriginalExtension();
                $request->file('filename')->storeAs('public/review', $fileName);
                Paper::find($id)->reviewer_poster()->updateExistingPivot($reviewer_id, [
                    's11' => $request->s11, 
                    's21' => $request->s21, 
                    's22' => $request->s22, 
                    's23' => $request->s23, 
                    'c11' => $request->c11, 
                    'c21' => $request->c21, 
                    'c22' => $request->c22, 
                    'c23' => $request->c23,
                    'comment' => $request->comment, 
                    'filename' => $fileName, 
                    'result' => $request->result
                ]);
            }else{
                Paper::find($id)->reviewer_poster()->updateExistingPivot($reviewer_id, [
                    's11' => $request->s11, 
                    's21' => $request->s21, 
                    's22' => $request->s22, 
                    's23' => $request->s23, 
                    'c11' => $request->c11, 
                    'c21' => $request->c21, 
                    'c22' => $request->c22, 
                    'c23' => $request->c23,
                    'comment' => $request->comment, 
                    'result' => $request->result
                ]);
            }
            return redirect()->route('reviewerlogin')->with('success', 'บันทึกการประเมิน Poster/Infographic เรียบร้อยแล้ว');
        }
    }

    public function review_full_save(Request $request, $id){
        $rule = [
            's11' => 'required',
            's21' => 'required',
            's22' => 'required',
            's31' => 'required',
            's32' => 'required',
            's33' => 'required',
            's41' => 'required',
            's51' => 'required',
            's52' => 'required',
            's61' => 'required',
            's62' => 'required',
            's63' => 'required',
            'result' => 'required',
            'filename' => 'nullable|mimes:doc,docx,pdf|max:30240',
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
            $reviewer_id = Auth::guard('reviewer')->user()->id;

            if($request->hasFile('filename')){
                $fileName = $id.'_'.time().'.'.$request->filename->getClientOriginalExtension();
                $request->file('filename')->storeAs('public/review', $fileName);
                Paper::find($id)->reviewer_full()->updateExistingPivot($reviewer_id, [
                    's11' => $request->s11, 
                    's21' => $request->s21, 
                    's22' => $request->s22, 
                    's31' => $request->s31, 
                    's32' => $request->s32, 
                    's33' => $request->s33, 
                    's41' => $request->s41, 
                    's51' => $request->s51, 
                    's52' => $request->s52, 
                    's61' => $request->s61, 
                    's62' => $request->s62, 
                    's63' => $request->s63,
                    'c11' => $request->c11, 
                    'c21' => $request->c21, 
                    'c22' => $request->c22, 
                    'c31' => $request->c31, 
                    'c32' => $request->c32, 
                    'c33' => $request->c33, 
                    'c41' => $request->c41, 
                    'c51' => $request->c51, 
                    'c52' => $request->c52, 
                    'c61' => $request->c61, 
                    'c62' => $request->c62, 
                    'c63' => $request->c63, 
                    'comment' => $request->comment, 
                    'filename' => $fileName, 
                    'result' => $request->result
                ]);
            }else{
                Paper::find($id)->reviewer_full()->updateExistingPivot($reviewer_id, [
                    's11' => $request->s11, 
                    's21' => $request->s21, 
                    's22' => $request->s22, 
                    's31' => $request->s31, 
                    's32' => $request->s32, 
                    's33' => $request->s33, 
                    's41' => $request->s41, 
                    's51' => $request->s51, 
                    's52' => $request->s52, 
                    's61' => $request->s61, 
                    's62' => $request->s62, 
                    's63' => $request->s63,
                    'c11' => $request->c11, 
                    'c21' => $request->c21, 
                    'c22' => $request->c22, 
                    'c31' => $request->c31, 
                    'c32' => $request->c32, 
                    'c33' => $request->c33, 
                    'c41' => $request->c41, 
                    'c51' => $request->c51, 
                    'c52' => $request->c52, 
                    'c61' => $request->c61, 
                    'c62' => $request->c62, 
                    'c63' => $request->c63, 
                    'comment' => $request->comment, 
                    'result' => $request->result
                ]);
            }
            return redirect()->route('reviewerlogin')->with('success', 'บันทึกการประเมินบทความฉบับเต็มเรียบร้อยแล้ว');
        }
    }

    public function accept_evaluate($id){
        $paper = Paper::find($id);
        return view('reviewers.pages.accept_evaluate')
            ->with(compact('paper'));
    }

    public function accept_evaluate_save(Request $request, $id){
        $reviewer_id = Auth::guard('reviewer')->user()->id;
        $reviewer = Reviewer::find($reviewer_id);
        $paper = Paper::find($id);

        if($request->accept == 1){
            // Paper::find($id)->reviewer_full()->updateExistingPivot($reviewer_id, ['accept' => 1]);
            if($paper->present == 1){
                $paper->reviewer_full()->updateExistingPivot($reviewer_id, ['accept' => 1]);
            }elseif($paper->present == 2){
                $paper->reviewer_abstract()->updateExistingPivot($reviewer_id, ['accept' => 1]);
            }elseif($paper->present == 3){
                $paper->reviewer_poster()->updateExistingPivot($reviewer_id, ['accept' => 1]);
            }
        }else{
            if($paper->present == 1){
                $paper->reviewer_full()->detach($reviewer);
            }elseif($paper->present == 2){
                $paper->reviewer_abstract()->detach($reviewer);
            }elseif($paper->present == 3){
                $paper->reviewer_poster()->detach($reviewer);
            }
            
            Mail::to('src13tsu@gmail.com')->send(new ReviewerRejectMail($reviewer, $paper));
        }
        return redirect()->route('reviewerlogin')->with('success', 'ตอบรับ/ปฏิเสธ ประเมินผลงานเรียบร้อยแล้ว');
    }

    public function pdf_abs(){
        $reviewer_id = Auth::guard('reviewer')->user()->id;
        $reviewer = Reviewer::find($reviewer_id);
        $pdf = PDF::loadView('reviewers.pages.invite_abs', ['reviewer' => $reviewer]);
        return $pdf->stream();
    }

    public function pdf_full(){
        $reviewer_id = Auth::guard('reviewer')->user()->id;
        $reviewer = Reviewer::find($reviewer_id);
        $paper_count = Paper::whereHas('reviewer_full', function($q){
            $reviewer_id = Auth::guard('reviewer')->user()->id;
            $q->where('rev_id', $reviewer_id);
        })->count();
        $pdf = PDF::loadView('reviewers.pages.invite_full', ['reviewer' => $reviewer, 'paper_count'=> $paper_count]);
        return $pdf->stream();
    }

    public function view_pwd(){
        return view('reviewers.pages.change_pwd');
    }

    public function change_pwd(Request $request){
        $reviewer_id = Auth::guard('reviewer')->user()->id;
        $reviewer = Reviewer::find($reviewer_id);
        if($request->old != $reviewer->password){
            return redirect()->back()->with('error', 'รหัสผ่านปัจจุบันไม่ถูกต้อง');
        }else if($request->pwd1 != $request->pwd2){
            return redirect()->back()->with('error', 'รหัสผ่านใหม่และยืนยันรหัสผ่าน ต้องเหมือนกัน');
        }else{
            Reviewer::where('id', $reviewer_id)->update(['password' => $request->pwd1]);
            return redirect()->route('reviewerlogin')->with('success', 'เปลี่ยนรหัสผ่านเรียบร้อยแล้ว');
        }
    }
}
