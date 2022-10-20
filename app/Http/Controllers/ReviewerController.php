<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Reviewer;
use App\Models\Paper;

use Validator;
use App\Mail\InviteReviewerMail;
use Illuminate\Support\Facades\Mail;

class ReviewerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->topic == ""){
            $reviewers = Reviewer::all();
        }else{
            $reviewers = Reviewer::where('ss1', $request->topic)->orWhere('ss2', $request->topic)->orWhere('ss3', $request->topic)->get();
        }
        $topics = Topic::all();
        return view('backend.pages.reviewers.index')
            ->with(compact('reviewers'))
            ->with(compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topics = Topic::all();
        return view('backend.pages.reviewers.create')
            ->with(compact('topics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rule = [
            'title' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'type' => 'required',
            'university' => 'required',
            'ss1' => 'required',
            'email' => 'required',
            'password' => 'required',
        ];
        $message = [
            'required' => 'ฟิลด์นี้จำเป็น',
        ];
        $validator = Validator::make($request->all(), $rule, $message);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $reviewer_data = array (
                'title' => $request->title,
                'fname' => $request->fname,
                'lname' => $request->lname,
                'type' => $request->type,
                'university' => $request->university,
                'ss1' => $request->ss1,
                'ss2' => $request->ss2,
                'ss3' => $request->ss3,
                'email' => $request->email,
                'telephone' => $request->telephone,
                'password' => $request->password,
                'invite' => 0,
                'invite_full' => 0,
                'create_at' => NOW(),
                'update_at' => NOW()
            );
            Reviewer::create($reviewer_data);
            return redirect()->route('reviewers.index')->with('success', 'เพิ่มผู้ทรงคุณวุฒิเรียบร้อยแล้ว');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reviewer = Reviewer::find($id);
        $topics = Topic::all();
        return view('backend.pages.reviewers.edit')
            ->with(compact('reviewer'))
            ->with(compact('topics'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rule = [
            'title' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'type' => 'required',
            'university' => 'required',
            'ss1' => 'required',
            'email' => 'required',
            'password' => 'required',
        ];
        $message = [
            'required' => 'ฟิลด์นี้จำเป็น',
        ];
        $validator = Validator::make($request->all(), $rule, $message);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $reviewer_data = array (
                'title' => $request->title,
                'fname' => $request->fname,
                'lname' => $request->lname,
                'type' => $request->type,
                'university' => $request->university,
                'ss1' => $request->ss1,
                'ss2' => $request->ss2,
                'ss3' => $request->ss3,
                'ss4' => $request->ss4,
                'email' => $request->email,
                'telephone' => $request->telephone,
                'password' => $request->password,
                'update_at' => NOW()
            );
            $reviewer = Reviewer::find($id);
            $reviewer->update($reviewer_data);
            return redirect()->route('reviewers.index')->with('success', 'ปรับปรุงข้อมูลผู้ทรงคุณวุฒิเรียบร้อยแล้ว');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reviewer = Reviewer::find($id);
        $reviewer->delete();
        return redirect()->route('reviewers.index')->with('success', 'ลบผู้ทรงคุณวุฒิเรียบร้อยแล้ว');
    }

    public function review_abstract($id){
        $reviewer = Reviewer::find($id);
        $papers = Paper::where('present', 2)->where('topic', '=', $reviewer->ss1)->orWhere('topic', '=', $reviewer->ss2)->orWhere('topic', '=', $reviewer->ss3)->orWhere('topic', '=', $reviewer->ss4)->get();
        return view('backend.pages.reviewers.review_abstract')
            ->with(compact('papers'))
            ->with(compact('reviewer'));
    }

    public function review_full($id){
        $reviewer = Reviewer::find($id);
        $papers = Paper::where('present', 1)->where('topic', '=', $reviewer->ss1)->orWhere('topic', '=', $reviewer->ss2)->orWhere('topic', '=', $reviewer->ss3)->orWhere('topic', '=', $reviewer->ss4)->get();
        return view('backend.pages.reviewers.review_full')
            ->with(compact('papers'))
            ->with(compact('reviewer'));
    }

    public function review_poster($id){
        $reviewer = Reviewer::find($id);
        $papers = Paper::where('present', 3)->where('topic', '=', $reviewer->ss1)->orWhere('topic', '=', $reviewer->ss2)->orWhere('topic', '=', $reviewer->ss3)->orWhere('topic', '=', $reviewer->ss4)->get();
        return view('backend.pages.reviewers.review_poster')
            ->with(compact('papers'))
            ->with(compact('reviewer'));
    }

    public function review_abstract_save(Request $request){
        $unchk = $request->unchk;
        $chk = $request->chk;
        for($i=0;$i<count($unchk);$i++){
            if(is_array($chk)){
                if(in_array($unchk[$i], $chk)){
                    //echo $unchk[$i]."check <br>";
                    $paper = Paper::find($unchk[$i]);
                    $review = $paper->reviewer_abs()->where('rev_id', $request->reviewer_id)->get();
                    if(!count($review)){
                        $reviewer = Reviewer::find($request->reviewer_id);
                        $paper->reviewer_abs()->attach($reviewer, ['approve' => 0]);
                    }
                }else{
                    //echo $unchk[$i]."Uncheck <br>";
                    $paper = Paper::find($unchk[$i]);
                    $review = $paper->reviewer_abs()->where('rev_id', $request->reviewer_id)->get();
                    if(count($review)){
                        $reviewer = Reviewer::find($request->reviewer_id);
                        $paper->reviewer_abs()->detach($reviewer);
                    }
                }
            }else{
                //echo $unchk[$i]."Uncheck <br>";
                $paper = Paper::find($unchk[$i]);
                $review = $paper->reviewer_abs()->where('rev_id', $request->reviewer_id)->get();
                if(count($review)){
                    $reviewer = Reviewer::find($request->reviewer_id);
                    $paper->reviewer_abs()->detach($reviewer);
                }
            }
        }
        return redirect()->route('reviewers.index')->with('success', 'จัดการผู้ประเมินบทความแล้ว');
    }

    public function review_full_save(Request $request){
        $unchk = $request->unchk;
        $chk = $request->chk;
        for($i=0;$i<count($unchk);$i++){
            if(is_array($chk)){
                if(in_array($unchk[$i], $chk)){
                    //echo $unchk[$i]."check <br>";
                    $paper = Paper::find($unchk[$i]);
                    $review = $paper->reviewer_full()->where('rev_id', $request->reviewer_id)->get();
                    if(!count($review)){
                        $reviewer = Reviewer::find($request->reviewer_id);
                        $paper->reviewer_full()->attach($reviewer, ['approve' => 0]);
                    }
                }else{
                    //echo $unchk[$i]."Uncheck <br>";
                    $paper = Paper::find($unchk[$i]);
                    $review = $paper->reviewer_full()->where('rev_id', $request->reviewer_id)->get();
                    if(count($review)){
                        $reviewer = Reviewer::find($request->reviewer_id);
                        $paper->reviewer_full()->detach($reviewer);
                    }
                }
            }else{
                //echo $unchk[$i]."Uncheck <br>";
                $paper = Paper::find($unchk[$i]);
                $review = $paper->reviewer_full()->where('rev_id', $request->reviewer_id)->get();
                if(count($review)){
                    $reviewer = Reviewer::find($request->reviewer_id);
                    $paper->reviewer_full()->detach($reviewer);
                }
            }
        }
        return redirect()->route('reviewers.index')->with('success', 'จัดการผู้ประเมินบทความแล้ว');
    }

    public function review_poster_save(Request $request){
        $unchk = $request->unchk;
        $chk = $request->chk;
        for($i=0;$i<count($unchk);$i++){
            if(is_array($chk)){
                if(in_array($unchk[$i], $chk)){
                    //echo $unchk[$i]."check <br>";
                    $paper = Paper::find($unchk[$i]);
                    $review = $paper->reviewer_poster()->where('rev_id', $request->reviewer_id)->get();
                    if(!count($review)){
                        $reviewer = Reviewer::find($request->reviewer_id);
                        $paper->reviewer_poster()->attach($reviewer, ['approve' => 0]);
                    }
                }else{
                    //echo $unchk[$i]."Uncheck <br>";
                    $paper = Paper::find($unchk[$i]);
                    $review = $paper->reviewer_poster()->where('rev_id', $request->reviewer_id)->get();
                    if(count($review)){
                        $reviewer = Reviewer::find($request->reviewer_id);
                        $paper->reviewer_poster()->detach($reviewer);
                    }
                }
            }else{
                //echo $unchk[$i]."Uncheck <br>";
                $paper = Paper::find($unchk[$i]);
                $review = $paper->reviewer_poster()->where('rev_id', $request->reviewer_id)->get();
                if(count($review)){
                    $reviewer = Reviewer::find($request->reviewer_id);
                    $paper->reviewer_poster()->detach($reviewer);
                }
            }
        }
        return redirect()->route('reviewers.index')->with('success', 'จัดการผู้ประเมินบทความแล้ว');
    }

    public function email_reviewer($id){
        $reviewer = Reviewer::find($id);
        $email = $reviewer->email;
        Reviewer::where('id', $id)->update(['invite' => 1]);
        Mail::to($email)->send(new InviteReviewerMail($reviewer));
        return redirect()->route('reviewers.index')->with('success', 'ส่งอีเมลเรียบร้อยแล้ว');
    }

}
