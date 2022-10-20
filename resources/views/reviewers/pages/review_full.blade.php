@extends('reviewers.layouts.default_layout')
@section('title') การประเมินคุณภาพบทความฉบับเต็ม @parent @endsection

@section('content')

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header bg-secondary">
            <h3 class="card-title">รายละเอียดบทความฉบับเต็ม</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                    title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <tr>
                    <th class="text-pt-blue" style="width: 20%">ชื่อบทความ</th>
                    <td style="width: 80%">{{ $paper->title }}</td>
                </tr>
                <tr>
                    <th class="text-pt-blue">ผู้ส่ง</th>
                    <td>@if($paper->user->academic !=
                        ""){{ $paper->user->academic }}@else{{ $paper->user->title }}@endif{{ $paper->user->fname.' '.$paper->user->lname }}
                    </td>
                </tr>
                <tr>
                    <th class="text-pt-blue">ผู้วิจัย/คณะ</th>
                    <td>{{ $paper->authors }}</td>
                </tr>
                <tr>
                    <th class="text-pt-blue">รูปแบบการนำเสนอ</th>
                    <td>{{ config('global.present')[$paper->present] }}</td>
                </tr>
                <tr>
                    <th class="text-pt-blue">กลุ่มสาขา</th>
                    <td>{{ $paper->topic.') '.$paper->topics->name }}</td>
                </tr>
                <tr>
                    <th class="text-pt-blue">ไฟล์บทความฉบับเต็ม</th>
                    <td><i class="far fa-file-word" aria-hidden="true"></i> <a
                            href="{{ asset('storage/fullpaper/'.$paper->fullpaper_word) }}" target="_blank">ไฟล์ Word</a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="far fa-file-pdf" aria-hidden="true"></i> <a
                            href="{{ asset('storage/fullpaper/'.$paper->fullpaper_pdf) }}" target="_blank">ไฟล์ Pdf</a>
                    </td>
                </tr>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!-- Default box -->
  <div class="card">
    <div class="card-header bg-secondary">
      <h3 class="card-title">การประเมินคุณภาพบทความฉบับเต็ม</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('reviewerlogin.review_full_save', $paper->id) }}" role="form" id="containerForm" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <p class="text-pt-blue font-weight-bold"><u>คำชี้แจง</u></p>
            <ol>
                <li>ในกรณีที่ผู้ประเมินเห็นว่าควรมีการปรับปรุง กรุณาระบุส่วนที่ควรปรับปรุง พร้อมทั้งข้อเสนอแนะแนวทางการปรับปรุง เพื่อให้ผู้เขียนได้นำไปปรับปรุงตามแนวทางต่อไป</li>
                <li>คณะกรรมการจะประมวลรายละเอียดในแบบฟอร์ม และแจ้งสรุปผลการประเมินให้แก่ผู้เขียนทราบ โดยจะไม่เปิดเผยชื่อผู้ประเมิน</li>
            </ol>
            <p class="text-pt-blue font-weight-bold"><u>หัวข้อการประเมิน</u></p>
            <table class="table table-bordered">
                <tr class="bg-light">
                    <th class="text-center" rowspan="2" style="width: 30%">หัวข้อประเมิน</th>
                    <th class="text-center" colspan="3" style="width: 21%">ผลการประเมิน</th>
                    <th class="text-center" rowspan="2">แนวทางแก้ไข/ข้อเสนอแนะ</th>
                </tr>
                <tr class="bg-light">
                    <th class="text-center" style="width: 7%">ผ่าน</th>
                    <th class="text-center" style="width: 7%">ปรับปรุง</th>
                    <th class="text-center" style="width: 7%">ไม่ผ่าน</th>
                </tr>
                <tr>
                    <td colspan="5">1. ชื่อเรื่อง</td>
                </tr>
                <tr>
                    <td>1.1 ชื่อเรื่อง (ภาษาไทยและภาษาอังกฤษ) มีความถูกต้องและเหมาะสม</td>
                    <td class="text-center">
                        <input class="@error('s11') is-invalid @enderror" type="radio" name="s11" id="s111" value="1" required
                        @if(old('s11') == 1) checked @elseif($paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->s11 == 1) checked @endif>
                    </td>
                    <td class="text-center">
                        <input class="@error('s11') is-invalid @enderror" type="radio" name="s11" id="s112" value="2"
                        @if(old('s11') == 2) checked @elseif($paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->s11 == 2) checked @endif>
                    </td>
                    <td class="text-center">
                        <input class="@error('s11') is-invalid @enderror" type="radio" name="s11" id="s113" value="3"
                        @if(old('s11') == 3) checked @elseif($paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->s11 == 3) checked @endif>
                    </td>
                    <td><textarea class="form-control" id="c11" name="c11" rows="2">@if(old('c11') != ""){{ old('c11') }}@else{{ $paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->c11 }}@endif</textarea></td>
                </tr>
                <tr>
                    <td colspan="5">2. บทคัดย่อ</td>
                </tr>
                <tr>
                    <td>2.1 บทคัดย่อภาษาไทยและภาษาอังกฤษมีความเหมาะสม</td>
                    <td class="text-center">
                        <input class="@error('s21') is-invalid @enderror" type="radio" name="s21" id="s211" value="1" required
                        @if(old('s21') == 1) checked @elseif($paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->s21 == 1) checked @endif>
                    </td>
                    <td class="text-center">
                        <input class="@error('s21') is-invalid @enderror" type="radio" name="s21" id="s212" value="2"
                        @if(old('s21') == 2) checked @elseif($paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->s21 == 2) checked @endif>
                    </td>
                    <td class="text-center">
                        <input class="@error('s21') is-invalid @enderror" type="radio" name="s21" id="s213" value="3"
                        @if(old('s21') == 3) checked @elseif($paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->s21 == 3) checked @endif>
                    </td>
                    <td><textarea class="form-control" id="c21" name="c21" rows="2">@if(old('c21') != ""){{ old('c21') }}@else{{ $paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->c21 }}@endif</textarea></td>
                </tr>
                <tr>
                    <td>2.2 บทคัดย่อครอบคลุมสาระสำคัญ</td>
                    <td class="text-center">
                        <input class="@error('s22') is-invalid @enderror" type="radio" name="s22" id="s221" value="1" required
                        @if(old('s22') == 1) checked @elseif($paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->s22 == 1) checked @endif>
                    </td>
                    <td class="text-center">
                        <input class="@error('s22') is-invalid @enderror" type="radio" name="s22" id="s222" value="2"
                        @if(old('s22') == 2) checked @elseif($paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->s22 == 2) checked @endif>
                    </td>
                    <td class="text-center">
                        <input class="@error('s22') is-invalid @enderror" type="radio" name="s22" id="s223" value="3"
                        @if(old('s22') == 3) checked @elseif($paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->s22 == 3) checked @endif>
                    </td>
                    <td><textarea class="form-control" id="c22" name="c22" rows="2">@if(old('c22') != ""){{ old('c22') }}@else{{ $paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->c22 }}@endif</textarea></td>
                </tr>
                <tr>
                    <td colspan="5">3. บทนำ</td>
                </tr>
                <tr>
                    <td>3.1 ความเป็นมาและความสำคัญของปัญหา</td>
                    <td class="text-center">
                        <input class="@error('s31') is-invalid @enderror" type="radio" name="s31" id="s311" value="1" required
                        @if(old('s31') == 1) checked @elseif($paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->s31 == 1) checked @endif>
                    </td>
                    <td class="text-center">
                        <input class="@error('s31') is-invalid @enderror" type="radio" name="s31" id="s312" value="2"
                        @if(old('s31') == 2) checked @elseif($paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->s31 == 2) checked @endif>
                    </td>
                    <td class="text-center">
                        <input class="@error('s31') is-invalid @enderror" type="radio" name="s31" id="s313" value="3"
                        @if(old('s31') == 3) checked @elseif($paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->s31 == 3) checked @endif>
                    </td>
                    <td><textarea class="form-control" id="c31" name="c31" rows="2">@if(old('c31') != ""){{ old('c31') }}@else{{ $paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->c31 }}@endif</textarea></td>
                </tr>
                <tr>
                    <td>3.2 วัตถุประสงค์ในการวิจัย</td>
                    <td class="text-center">
                        <input class="@error('s32') is-invalid @enderror" type="radio" name="s32" id="s321" value="1" required
                        @if(old('s32') == 1) checked @elseif($paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->s32 == 1) checked @endif>
                    </td>
                    <td class="text-center">
                        <input class="@error('s32') is-invalid @enderror" type="radio" name="s32" id="s322" value="2"
                        @if(old('s32') == 2) checked @elseif($paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->s32 == 2) checked @endif>
                    </td>
                    <td class="text-center">
                        <input class="@error('s32') is-invalid @enderror" type="radio" name="s32" id="s323" value="3"
                        @if(old('s32') == 3) checked @elseif($paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->s32 == 3) checked @endif>
                    </td>
                    <td><textarea class="form-control" id="c32" name="c32" rows="2">@if(old('c32') != ""){{ old('c32') }}@else{{ $paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->c32 }}@endif</textarea></td>
                </tr>
                <tr>
                    <td>3.3 มีการอ้างอิงแนวคิด ทฤษฎี</td>
                    <td class="text-center">
                        <input class="@error('s33') is-invalid @enderror" type="radio" name="s33" id="s331" value="1" required
                        @if(old('s33') == 1) checked @elseif($paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->s33 == 1) checked @endif>
                    </td>
                    <td class="text-center">
                        <input class="@error('s33') is-invalid @enderror" type="radio" name="s33" id="s332" value="2"
                        @if(old('s33') == 2) checked @elseif($paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->s33 == 2) checked @endif>
                    </td>
                    <td class="text-center">
                        <input class="@error('s33') is-invalid @enderror" type="radio" name="s33" id="s333" value="3"
                        @if(old('s33') == 3) checked @elseif($paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->s33 == 3) checked @endif>
                    </td>
                    <td><textarea class="form-control" id="c33" name="c33" rows="2">@if(old('c33') != ""){{ old('c33') }}@else{{ $paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->c33 }}@endif</textarea></td>
                </tr>
                <tr>
                    <td colspan="5">4. ระเบียบวิธีวิจัย </td>
                </tr>
                <tr>
                    <td>4.1 มีระเบียบวิธีวิจัยที่เหมาะสม</td>
                    <td class="text-center">
                        <input class="@error('s41') is-invalid @enderror" type="radio" name="s41" id="s411" value="1" required
                        @if(old('s41') == 1) checked @elseif($paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->s41 == 1) checked @endif>
                    </td>
                    <td class="text-center">
                        <input class="@error('s41') is-invalid @enderror" type="radio" name="s41" id="s412" value="2"
                        @if(old('s41') == 2) checked @elseif($paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->s41 == 2) checked @endif>
                    </td>
                    <td class="text-center">
                        <input class="@error('s41') is-invalid @enderror" type="radio" name="s41" id="s413" value="3"
                        @if(old('s41') == 3) checked @elseif($paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->s41 == 3) checked @endif>
                    </td>
                    <td><textarea class="form-control" id="c41" name="c41" rows="2">@if(old('c41') != ""){{ old('c41') }}@else{{ $paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->c41 }}@endif</textarea></td>
                </tr>
                <tr>
                    <td colspan="5">5. ผลการวิจัย</td>
                </tr>
                <tr>
                    <td>5.1 มีการนำเสนอประเด็นครบถ้วนตรงตามวัตถุประสงค์</td>
                    <td class="text-center">
                        <input class="@error('s51') is-invalid @enderror" type="radio" name="s51" id="s511" value="1" required
                        @if(old('s51') == 1) checked @elseif($paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->s51 == 1) checked @endif>
                    </td>
                    <td class="text-center">
                        <input class="@error('s51') is-invalid @enderror" type="radio" name="s51" id="s512" value="2"
                        @if(old('s51') == 2) checked @elseif($paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->s51 == 2) checked @endif>
                    </td>
                    <td class="text-center">
                        <input class="@error('s51') is-invalid @enderror" type="radio" name="s51" id="s513" value="3"
                        @if(old('s51') == 3) checked @elseif($paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->s51 == 3) checked @endif>
                    </td>
                    <td><textarea class="form-control" id="c51" name="c51" rows="2">@if(old('c51') != ""){{ old('c51') }}@else{{ $paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->c51 }}@endif</textarea></td>
                </tr>
                <tr>
                    <td>5.2 อธิบายข้อมูลเข้าใจง่าย เป็นระบบ และสอดคล้องตามหลักวิชาการ</td>
                    <td class="text-center">
                        <input class="@error('s52') is-invalid @enderror" type="radio" name="s52" id="s521" value="1" required
                        @if(old('s52') == 1) checked @elseif($paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->s52 == 1) checked @endif>
                    </td>
                    <td class="text-center">
                        <input class="@error('s52') is-invalid @enderror" type="radio" name="s52" id="s522" value="2"
                        @if(old('s52') == 2) checked @elseif($paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->s52 == 2) checked @endif>
                    </td>
                    <td class="text-center">
                        <input class="@error('s52') is-invalid @enderror" type="radio" name="s52" id="s523" value="3"
                        @if(old('s52') == 3) checked @elseif($paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->s52 == 3) checked @endif>
                    </td>
                    <td><textarea class="form-control" id="c52" name="c52" rows="2">@if(old('c52') != ""){{ old('c52') }}@else{{ $paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->c52 }}@endif</textarea></td>
                </tr>
                <tr>
                    <td colspan="5">6. สรุปผล การอภิปรายผล และข้อเสนอแนะ</td>
                </tr>
                <tr>
                    <td>6.1 อธิบายข้อมูลเข้าใจง่าย เป็นระบบ</td>
                    <td class="text-center">
                        <input class="@error('s61') is-invalid @enderror" type="radio" name="s61" id="s611" value="1" required
                        @if(old('s61') == 1) checked @elseif($paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->s61 == 1) checked @endif>
                    </td>
                    <td class="text-center">
                        <input class="@error('s61') is-invalid @enderror" type="radio" name="s61" id="s612" value="2"
                        @if(old('s61') == 2) checked @elseif($paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->s61 == 2) checked @endif>
                    </td>
                    <td class="text-center">
                        <input class="@error('s61') is-invalid @enderror" type="radio" name="s61" id="s613" value="3"
                        @if(old('s61') == 3) checked @elseif($paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->s61 == 3) checked @endif>
                    </td>
                    <td><textarea class="form-control" id="c61" name="c61" rows="2">@if(old('c61') != ""){{ old('c61') }}@else{{ $paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->c61 }}@endif</textarea></td>
                </tr>
                <tr>
                    <td>6.2 ความครบถ้วนของประเด็นการอภิปรายผลกับผลการวิจัย</td>
                    <td class="text-center">
                        <input class="@error('s62') is-invalid @enderror" type="radio" name="s62" id="s621" value="1" required
                        @if(old('s62') == 1) checked @elseif($paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->s62 == 1) checked @endif>
                    </td>
                    <td class="text-center">
                        <input class="@error('s62') is-invalid @enderror" type="radio" name="s62" id="s622" value="2"
                        @if(old('s62') == 2) checked @elseif($paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->s62 == 2) checked @endif>
                    </td>
                    <td class="text-center">
                        <input class="@error('s62') is-invalid @enderror" type="radio" name="s62" id="s623" value="3"
                        @if(old('s62') == 3) checked @elseif($paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->s62 == 3) checked @endif>
                    </td>
                    <td><textarea class="form-control" id="c62" name="c62" rows="2">@if(old('c62') != ""){{ old('c62') }}@else{{ $paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->c62 }}@endif</textarea></td>
                </tr>
                <tr>
                    <td>6.3 มีข้อเสนอแนะที่ดี</td>
                    <td class="text-center">
                        <input class="@error('s63') is-invalid @enderror" type="radio" name="s63" id="s631" value="1" required
                        @if(old('s63') == 1) checked @elseif($paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->s63 == 1) checked @endif>
                    </td>
                    <td class="text-center">
                        <input class="@error('s63') is-invalid @enderror" type="radio" name="s63" id="s632" value="2"
                        @if(old('s63') == 2) checked @elseif($paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->s63 == 2) checked @endif>
                    </td>
                    <td class="text-center">
                        <input class="@error('s63') is-invalid @enderror" type="radio" name="s63" id="s633" value="3"
                        @if(old('s63') == 3) checked @elseif($paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->s63 == 3) checked @endif>
                    </td>
                    <td><textarea class="form-control" id="c63" name="c63" rows="2">@if(old('c63') != ""){{ old('c63') }}@else{{ $paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->c63 }}@endif</textarea></td>
                </tr>
            </table>
            <p class="text-pt-blue font-weight-bold"><u>ข้อเสนอแนะอื่น ๆ </u></p>
            <textarea class="form-control" id="comment" name="comment" rows="3">@if(old('comment') != ""){{ old('comment') }}@else{{ $paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->comment }}@endif</textarea>
            <p class="text-pt-blue font-weight-bold pt-2"><u>ผลการพิจารณาของผู้ทรงคุณวุฒิ</u></p>
            <div class="form-group row">
                <div class="col-sm-10">
                    <div class="form-check">
                            <input class="form-check-input  @error('result') is-invalid @enderror" type="radio" name="result" id="result1" value="1"
                            @if(old('result') == 1) checked
                            @elseif($paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->result == 1) checked @endif>
                            <label class="form-check-label" for="result1">ผ่าน โดยไม่มีการแก้ไข</label>
                    </div>
                    <div class="form-check">
                            <input class="form-check-input  @error('result') is-invalid @enderror" type="radio" name="result" id="result2" value="2"
                            @if(old('result') == 2) checked
                            @elseif($paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->result == 2) checked @endif>
                            <label class="form-check-label" for="result2">ผ่าน โดยแก้ไขตามข้อเสนอแนะ</label>
                    </div>
                    <div class="form-check">
                            <input class="form-check-input  @error('result') is-invalid @enderror" type="radio" name="result" id="result3" value="3"
                            @if(old('result') == 3) checked
                            @elseif($paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->result == 3) checked @endif>
                            <label class="form-check-label" for="result3">ไม่ผ่านการประเมิน</label>
                    </div>
                </div>
            </div>
            
            <div class="form-group row">
                <label for="filename">แนบไฟล์ (ถ้ามี)</label>
                <div class="col-sm-6">
                    <input type="file" class="form-control @error('filename') is-invalid @enderror" id="filename" name="filename">
                    @error('filename')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <span>
                        @if($paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->filename != NULL)
                        <a href="{{ asset('storage/review/'.$paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->filename) }}" target="_blank">ไฟล์แนบ</a>
                        @endif
                    </span>
                </div>
                <div class="col-sm-4">
                    <small id="passwordHelpInline" class="text-muted">ไฟล์ .doc, .docx หรือ .pdf ขนาดไม่เกิน 30 MB</small>
                </div>
            </div>
            <div class="form-group row mt-2">
                @if (!$paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->approve)
                   <button type="submit" name="Submit" class="btn btn-primary">บันทึกผลการประเมิน</button>&nbsp;&nbsp;&nbsp;
                @endif
                <a class="btn btn-warning" href="{{ url('reviewers/')}}">ยกเลิก</a>
            </div>
        </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
  <section id="loading">
    <div id="loading-content"></div>
  </section>
  <script>
    function showLoading() {
    document.querySelector('#loading').classList.add('loading');
    document.querySelector('#loading-content').classList.add('loading-content');
  }

  function hideLoading() {
    document.querySelector('#loading').classList.remove('loading');
    document.querySelector('#loading-content').classList.remove('loading-content');
  }
  </script>
</section>
@endsection
