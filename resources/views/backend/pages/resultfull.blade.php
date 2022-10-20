@extends('backend.layouts.default_layout')
@section('title') ผลการประเมินเรื่องเต็ม @parent @endsection

@section('content')

<!-- Main content -->
<section class="content">
  <section id="loading">
    <div id="loading-content"></div>
  </section>
  <!-- Default box -->
  <div class="card">
    <div class="card-header bg-secondary">
      <h3 class="card-title">รายละเอียดผลงาน</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
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
      <h3 class="card-title">ผลการประเมินเรื่องบทความฉบับเต็ม</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
        @foreach ($paper->reviewer_full as $reviewer)
          <table class="table table-hover">
            <tr class="bg-info">
                <th class="text-warning" style="width: 12%">ผู้ทรงคุณวุฒิ #{{ $loop->index +1 }}</th>
                <td>{{ $reviewer->title.$reviewer->fname." ".$reviewer->lname }}</td>
            </tr>
            <tr>
                <th class="text-pt-blue">ผลการประเมิน</th>
                <td>
                @if($reviewer->pivot->result == 1)
                <span class="text-success"><i class="fas fa-check-square" aria-hidden="true"></i> ผ่าน โดยไม่มีการแก้ไข</span>
                @elseif($reviewer->pivot->result == 2)
                <span class="text-success"><i class="fas fa-check-square" aria-hidden="true"></i> ผ่าน โดยแก้ไขตามข้อเสนอแนะ</span>
                @elseif($reviewer->pivot->result == 3)
                <span class="text-danger"><i class="fas fa-times-circle" aria-hidden="true"></i> ไม่ผ่านการประเมิน</span>
                @else
                <span class="text-warning"><i class="fas fa-hourglass-start"></i> ยังไม่ประเมิน</span>
                @endif
                </td>
            </tr>
          </table>
            @if($reviewer->pivot->result != NULL)
            <table class="table table-bordered">
              <tr class="bg-light">
                <th class="text-center" style="width: 35%">หัวข้อการประเมิน</th>
                <th class="text-center" style="width: 10%">ผลการประเมิน</th>
                <th class="text-center">แนวทางแก้ไข/ข้อเสนอแนะ</th>
              </tr>
              <tr>
                <td colspan="3">1. ชื่อเรื่อง</td>
              </tr>
              <tr>
                <td>1.1 ชื่อเรื่อง (ภาษาไทยและภาษาอังกฤษ) มีความถูกต้องและเหมาะสม</td>
                <td class="text-center">{{ config('global.result')[$reviewer->pivot->s11] }}</td>
                <td>@if($reviewer->pivot->c11 == NULL)<small class="text-secondary"> -- ไม่มี -- </small>@else {{ $reviewer->pivot->c11 }}@endif</td>
              </tr>
              <tr>
                <td colspan="3">2. บทคัดย่อ</td>
              </tr>
              <tr>
                <td>2.1 บทคัดย่อภาษาไทยและภาษาอังกฤษมีความเหมาะสม</td>
                <td class="text-center">{{ config('global.result')[$reviewer->pivot->s21] }}</td>
                <td>@if($reviewer->pivot->c21 == NULL)<small class="text-secondary"> -- ไม่มี -- </small>@else {{ $reviewer->pivot->c21 }}@endif</td>
              </tr>
              <tr>
                <td>2.2 บทคัดย่อครอบคลุมสาระสำคัญ</td>
                <td class="text-center">{{ config('global.result')[$reviewer->pivot->s22] }}</td>
                <td>@if($reviewer->pivot->c22 == NULL)<small class="text-secondary"> -- ไม่มี -- </small>@else {{ $reviewer->pivot->c22 }}@endif</td>
              </tr>
              <tr>
                <td colspan="3">3. บทนำ</td>
              </tr>
              <tr>
                <td>3.1 ความเป็นมาและความสำคัญของปัญหา</td>
                <td class="text-center">{{ config('global.result')[$reviewer->pivot->s31] }}</td>
                <td>@if($reviewer->pivot->c31 == NULL)<small class="text-secondary"> -- ไม่มี -- </small>@else {{ $reviewer->pivot->c31 }}@endif</td>
              </tr>
              <tr>
                <td>3.2 วัตถุประสงค์ในการวิจัย</td>
                <td class="text-center">{{ config('global.result')[$reviewer->pivot->s32] }}</td>
                <td>@if($reviewer->pivot->c32 == NULL)<small class="text-secondary"> -- ไม่มี -- </small>@else {{ $reviewer->pivot->c32 }}@endif</td>
              </tr>
              <tr>
                <td>3.3 มีการอ้างอิงแนวคิด ทฤษฎี</td>
                <td class="text-center">{{ config('global.result')[$reviewer->pivot->s33] }}</td>
                <td>@if($reviewer->pivot->c33 == NULL)<small class="text-secondary"> -- ไม่มี -- </small>@else {{ $reviewer->pivot->c33 }}@endif</td>
              </tr>
              <tr>
                <td colspan="3">4. ระเบียบวิธีวิจัย</td>
              </tr>
              <tr>
                <td>4.1 มีระเบียบวิธีวิจัยที่เหมาะสม</td>
                <td class="text-center">{{ config('global.result')[$reviewer->pivot->s41] }}</td>
                <td>@if($reviewer->pivot->c41 == NULL)<small class="text-secondary"> -- ไม่มี -- </small>@else {{ $reviewer->pivot->c41 }}@endif</td>
              </tr>
              <tr>
                <td colspan="3">5. ผลการวิจัย</td>
              </tr>
              <tr>
                <td>5.1 มีการนำเสนอประเด็นครบถ้วนตรงตามวัตถุประสงค์</td>
                <td class="text-center">{{ config('global.result')[$reviewer->pivot->s51] }}</td>
                <td>@if($reviewer->pivot->c51 == NULL)<small class="text-secondary"> -- ไม่มี -- </small>@else {{ $reviewer->pivot->c51 }}@endif</td>
              </tr>
              <tr>
                <td>5.2 อธิบายข้อมูลเข้าใจง่าย เป็นระบบ และสอดคล้องตามหลักวิชาการ</td>
                <td class="text-center">{{ config('global.result')[$reviewer->pivot->s52] }}</td>
                <td>@if($reviewer->pivot->c52 == NULL)<small class="text-secondary"> -- ไม่มี -- </small>@else {{ $reviewer->pivot->c52 }}@endif</td>
              </tr>
              <tr>
                <td colspan="3">6. สรุปผล การอภิปรายผล และข้อเสนอแนะ</td>
              </tr>
              <tr>
                <td>6.1 อธิบายข้อมูลเข้าใจง่าย เป็นระบบ</td>
                <td class="text-center">{{ config('global.result')[$reviewer->pivot->s61] }}</td>
                <td>@if($reviewer->pivot->c61 == NULL)<small class="text-secondary"> -- ไม่มี -- </small>@else {{ $reviewer->pivot->c61 }}@endif</td>
              </tr>
              <tr>
                <td>6.2 ความครบถ้วนของประเด็นการอภิปรายผลกับผลการวิจัย</td>
                <td class="text-center">{{ config('global.result')[$reviewer->pivot->s62] }}</td>
                <td>@if($reviewer->pivot->c62 == NULL)<small class="text-secondary"> -- ไม่มี -- </small>@else {{ $reviewer->pivot->c62 }}@endif</td>
              </tr>
              <tr>
                <td>6.3 มีข้อเสนอแนะที่ดี</td>
                <td class="text-center">{{ config('global.result')[$reviewer->pivot->s63] }}</td>
                <td>@if($reviewer->pivot->c63 == NULL)<small class="text-secondary"> -- ไม่มี -- </small>@else {{ $reviewer->pivot->c63 }}@endif</td>
              </tr>
            </table>
            <table class="table">
              <tr>
                <td style="width: 12%">ข้อเสนอแนะอื่น ๆ</td>
                <td>@if($reviewer->pivot->comment == NULL)<small class="text-secondary"> -- ไม่มี -- </small>@else {{ $reviewer->pivot->comment }}@endif</td>
              </tr>
              <tr>
                <td>ไฟล์แนบ</td>
                <td>@if($reviewer->pivot->filename == NULL)<small class="text-secondary"> -- ไม่มี -- </small>@else <a href="{{ asset('storage/review/'.$reviewer->pivot->filename) }}" target="_blank">ไฟล์แนบ</a>@endif</td>
              </tr>
            </table>
            @endif
        @endforeach
        <hr>
        <form method="POST" action="{{ route('backend.resultfull_save', $paper->id) }}" role="form" id="containerForm">
          @csrf
          <p class="text-primary font-weight-bold">สรุปผลการพิจารณาจากฝ่ายเลขา</p>
          <div class="form-group row">
              <div class="col-sm-1"></div>
              <div class="col-sm-10">
                  <div class="radio">
                      <label>
                          <input type="radio" name="result" id="result1" value="1" @if($paper->result == 1) checked @endif required>
                          ผ่าน โดยไม่มีการแก้ไข
                      </label>
                  </div>
                  <div class="radio">
                      <label>
                          <input type="radio" name="result" id="result2" value="2" @if($paper->result == 2) checked @endif required>
                          ผ่าน โดยแก้ไขตามข้อเสนอแนะ
                      </label>
                  </div>
                  <div class="radio">
                    <label>
                        <input type="radio" name="result" id="result3" value="3" @if($paper->result == 3) checked @endif required>
                        ไม่ผ่านการประเมิน
                    </label>
                </div>
              </div>
          </div>
          <div class="form-group row">
              <div class="col-sm-1">
              </div>
              <div class="col-sm-9">
                  @if($paper->paper_status == 1 and $paper->reviewer_full()->where('result','!=', 0)->count() == $paper->reviewer_full()->count() and $paper->reviewer_full()->count() != 0)
                  <button type="submit" name="Submit" class="btn btn-success" onclick="showLoading();">แจ้งผลการพิจารณาบทความฉบับเต็ม</button>
                  @endif
                  <button type="button" class="btn btn-warning" onclick="history.back()">ย้อนกลับ</button>
              </div>
          </div>
      </form> 
      {{-- <div class="mt-3">
        <button type="button" class="btn btn-warning" onclick="history.back()">ย้อนกลับ</button>
          
      </div> --}}
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
  
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
@endsection
