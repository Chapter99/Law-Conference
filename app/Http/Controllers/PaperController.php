<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Models\Paper;
use App\Models\Topic;

class PaperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topics = Topic::all();
        return view('users.pages.papers.create')
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
            'authors' => 'required',
            'present' => 'required',
            'topic' => 'required',
        ];

        if($request->present == 1){
            $rule['fullpaper_word'] = 'required|mimes:doc,docx|max:30240';
            $rule['fullpaper_pdf'] = 'required|mimes:pdf|max:30240';
        }
        if($request->present == 2){
            $rule['abstract_word'] = 'required|mimes:doc,docx|max:30240';
            $rule['abstract_pdf'] = 'required|mimes:pdf|max:30240';
        }
        if($request->present == 3){
            $rule['poster'] = 'required|mimes:png,jpeg,pdf|max:30240';
        }

        $message = [
            'required' => 'ฟิลด์นี้จำเป็น',
            'mimes' => 'ชนิดไฟล์ ไม่ถูกต้อง',
            'max' => 'ขนาดไฟล์ใหญ่กว่าที่กำหนด'
        ];
        $validator = Validator::make($request->all(), $rule, $message);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $paper_data = array (
                'user_id' => $request->user_id,
                'title' => $request->title,
                'authors' => $request->authors,
                'present' => $request->present,
                'topic' => $request->topic,
                'paper_status' => 1,
                'create_at' => NOW(),
                'update_at' => NOW()
            );
            if($request->hasFile('abstract_word') and $request->hasFile('abstract_pdf')){
                $fileNameWord = $request->user_id.'_'.time().'.'.$request->abstract_word->getClientOriginalExtension();
                $filePathWord = $request->file('abstract_word')->storeAs('public/abstract', $fileNameWord);
                $paper_data['abstract_word'] = $fileNameWord;

                $fileNamePdf = $request->user_id.'_'.time().'.'.$request->abstract_pdf->getClientOriginalExtension();
                $filePathPdf = $request->file('abstract_pdf')->storeAs('public/abstract', $fileNamePdf);
                $paper_data['abstract_pdf'] = $fileNamePdf;
            }
            if($request->hasFile('fullpaper_word') and $request->hasFile('fullpaper_pdf')){
                $fileNameWord = $request->user_id.'_'.time().'.'.$request->fullpaper_word->getClientOriginalExtension();
                $filePathWord = $request->file('fullpaper_word')->storeAs('public/fullpaper', $fileNameWord);
                $paper_data['fullpaper_word'] = $fileNameWord;

                $fileNamePdf = $request->user_id.'_'.time().'.'.$request->fullpaper_pdf->getClientOriginalExtension();
                $filePathPdf = $request->file('fullpaper_pdf')->storeAs('public/fullpaper', $fileNamePdf);
                $paper_data['fullpaper_pdf'] = $fileNamePdf;
            }
            if($request->hasFile('poster')){
                $fileNameImg = $request->user_id.'_'.time().'.'.$request->poster->getClientOriginalExtension();
                $filePathPdf = $request->file('poster')->storeAs('public/poster', $fileNameImg);
                $paper_data['poster'] = $fileNameImg;
            }
            Paper::create($paper_data);
            return redirect()->route('users.home')->with('success', 'ส่งผลงานเรียบร้อย');
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
        $user_id = Auth::user()->id;
        $paper = Paper::where('id', $id)->Where('user_id',$user_id)->first();
        return view('users.pages.papers.show')
            ->with(compact('paper'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $topics = Topic::all();
        $user_id = Auth::user()->id;
        $paper = Paper::where('id', $id)->Where('user_id',$user_id)->first();
        return view('users.pages.papers.edit')
            ->with(compact('topics'))
            ->with(compact('paper'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paper $paper)
    {
        $rule = [
            'title' => 'required',
            'authors' => 'required',
            'present' => 'required',
            'topic' => 'required',
        ];

        if($request->present == 1){
            $rule['fullpaper_word'] = 'mimes:doc,docx|max:30240';
            $rule['fullpaper_pdf'] = 'mimes:pdf|max:30240';
        }
        if($request->present == 2){
            $rule['abstract_word'] = 'mimes:doc,docx|max:30240';
            $rule['abstract_pdf'] = 'mimes:pdf|max:30240';
        }
        if($request->present == 3){
            $rule['poster'] = 'mimes:png,jpeg,pdf|max:30240';
        }

        $message = [
            'required' => 'ฟิลด์นี้จำเป็น',
            'mimes' => 'ชนิดไฟล์ ไม่ถูกต้อง',
            'max' => 'ขนาดไฟล์ใหญ่กว่าที่กำหนด'
        ];
        $validator = Validator::make($request->all(), $rule, $message);

        if($validator->fails()){
            $paper = Paper::find($paper->id);
            $topics = Topic::all();
            return redirect()->back()->withErrors($validator)->with(compact('topics'))->with(compact('paper'));
        }else{
            $paper_data = array (
                'title' => $request->title,
                'authors' => $request->authors,
                'present' => $request->present,
                'topic' => $request->topic,
                'update_at' => NOW()
            );
            if($request->hasFile('abstract_word') and $request->hasFile('abstract_pdf')){
                $fileNameWord = $request->user_id.'_'.time().'.'.$request->abstract_word->getClientOriginalExtension();
                $filePathWord = $request->file('abstract_word')->storeAs('public/abstract', $fileNameWord);
                $paper_data['abstract_word'] = $fileNameWord;

                $fileNamePdf = $request->user_id.'_'.time().'.'.$request->abstract_pdf->getClientOriginalExtension();
                $filePathPdf = $request->file('abstract_pdf')->storeAs('public/abstract', $fileNamePdf);
                $paper_data['abstract_pdf'] = $fileNamePdf;
            }
            if($request->hasFile('fullpaper_word') and $request->hasFile('fullpaper_pdf')){
                $fileNameWord = $request->user_id.'_'.time().'.'.$request->fullpaper_word->getClientOriginalExtension();
                $filePathWord = $request->file('fullpaper_word')->storeAs('public/fullpaper', $fileNameWord);
                $paper_data['fullpaper_word'] = $fileNameWord;

                $fileNamePdf = $request->user_id.'_'.time().'.'.$request->fullpaper_pdf->getClientOriginalExtension();
                $filePathPdf = $request->file('fullpaper_pdf')->storeAs('public/fullpaper', $fileNamePdf);
                $paper_data['fullpaper_pdf'] = $fileNamePdf;
            }
            if($request->hasFile('poster')){
                $fileNameImg = $request->user_id.'_'.time().'.'.$request->poster->getClientOriginalExtension();
                $filePathPdf = $request->file('poster')->storeAs('public/poster', $fileNameImg);
                $paper_data['poster'] = $fileNameImg;
            }

            $paper->update($paper_data);
            return redirect()->route('users.home')->with('success', 'ปรับปรุงเรียบร้อย');
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
        //
    }

    public function result_abs($id){
        $user_id = Auth::user()->id;
        $paper = Paper::where('id', $id)->Where('user_id',$user_id)->first();
        return view('users.pages.papers.result_abs')
            ->with(compact('paper'));
    }

    public function result_full($id){
        $user_id = Auth::user()->id;
        $paper = Paper::where('id', $id)->Where('user_id',$user_id)->first();
        return view('users.pages.papers.result_full')
            ->with(compact('paper'));
    }

    public function result_poster($id){
        $user_id = Auth::user()->id;
        $paper = Paper::where('id', $id)->Where('user_id',$user_id)->first();
        return view('users.pages.papers.result_poster')
            ->with(compact('paper'));
    }

    public function confirm_present(Request $request, $id){
        $confirm_data = array(
            'confirm' => $request->confirm,
            'update_at' => NOW()
        );
        $paper = Paper::find($id);
        $paper->update($confirm_data);
        return redirect()->route('users.home')->with('success', 'บันทึกข้อมูลการยืนยันการเข้าร่วมนำเสนอผลงานเรียบร้อยแล้ว');
    }

    public function upload_paper($id){
        $user_id = Auth::user()->id;
        $paper = Paper::where('id', $id)->Where('user_id',$user_id)->first();
        return view('users.pages.papers.upload_paper')
            ->with(compact('paper'));
    }

    public function upload_paper_update(Request $request, $id){
        $rule = [
            'present' => 'required',
        ];

        if($request->present == 1){
            $rule['fullpaper_word'] = 'required|mimes:doc,docx|max:30240';
            $rule['fullpaper_pdf'] = 'required|mimes:pdf|max:30240';
        }
        if($request->present == 2){
            $rule['abstract_word'] = 'required|mimes:doc,docx|max:30240';
            $rule['abstract_pdf'] = 'required|mimes:pdf|max:30240';
        }
        if($request->present == 3){
            $rule['poster'] = 'required|mimes:png,jpeg,pdf|max:30240';
        }
        $message = [
            'required' => 'ฟิลด์นี้จำเป็น',
            'mimes' => 'ชนิดไฟล์ ไม่ถูกต้อง',
            'max' => 'ขนาดไฟล์ใหญ่กว่าที่กำหนด'
        ];
        $validator = Validator::make($request->all(), $rule, $message);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $paper_data = array (
                'paper_status' => 3,
                'update_at' => NOW()
            );
            if($request->hasFile('abstract_word') and $request->hasFile('abstract_pdf')){
                $fileNameWord = $request->user_id.'_'.time().'.'.$request->abstract_word->getClientOriginalExtension();
                $filePathWord = $request->file('abstract_word')->storeAs('public/abstract', $fileNameWord);
                $paper_data['abstract_word2'] = $fileNameWord;

                $fileNamePdf = $request->user_id.'_'.time().'.'.$request->abstract_pdf->getClientOriginalExtension();
                $filePathPdf = $request->file('abstract_pdf')->storeAs('public/abstract', $fileNamePdf);
                $paper_data['abstract_pdf2'] = $fileNamePdf;
            }
            if($request->hasFile('fullpaper_word') and $request->hasFile('fullpaper_pdf')){
                $fileNameWord = $request->user_id.'_'.time().'.'.$request->fullpaper_word->getClientOriginalExtension();
                $filePathWord = $request->file('fullpaper_word')->storeAs('public/fullpaper', $fileNameWord);
                $paper_data['fullpaper_word2'] = $fileNameWord;

                $fileNamePdf = $request->user_id.'_'.time().'.'.$request->fullpaper_pdf->getClientOriginalExtension();
                $filePathPdf = $request->file('fullpaper_pdf')->storeAs('public/fullpaper', $fileNamePdf);
                $paper_data['fullpaper_pdf2'] = $fileNamePdf;
            }
            if($request->hasFile('poster')){
                $fileNameImg = $request->user_id.'_'.time().'.'.$request->poster->getClientOriginalExtension();
                $filePathPdf = $request->file('poster')->storeAs('public/poster', $fileNameImg);
                $paper_data['poster2'] = $fileNameImg;
            }

            $paper = Paper::find($id);
            $paper->update($paper_data);
            return redirect()->route('users.home')->with('success', 'บันทึกข้อมูลเรียบร้อย');
        }
    }

    public function loadFullPaper(){
        return view('users.pages.papers.loadFullPaper');
    }

    public function loadAbstractPaper(){
        return view('users.pages.papers.loadAbstractPaper');
    }

    public function loadPoster(){
        return view('users.pages.papers.loadPoster');
    }

    public function selectPublish($id){
        $user_id = Auth::user()->id;
        $paper = Paper::where('id', $id)->Where('user_id',$user_id)->first();
        return view('users.pages.papers.selectPublish')
            ->with(compact('paper'));
    }

    public function selectPublish_save(Request $request, $id){
        $rule = [
            'publish' => 'required',
        ];
        if($request->publish == 3){
            $rule['journal'] = 'required';
        }
        $message = [
            'required' => 'ฟิลด์นี้จำเป็น',
        ];
        $validator = Validator::make($request->all(), $rule, $message);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }else{
            $paper_data = array (
                'publish' => $request->publish,
                'update_at' => NOW()
            );
            if($request->publish == 3){
                $paper_data['journal'] = $request->journal;
            }

            $paper = Paper::find($id);
            $paper->update($paper_data);
            return redirect()->route('users.home')->with('success', 'บันทึกข้อมูลเรียบร้อย');
        }
    }
}
