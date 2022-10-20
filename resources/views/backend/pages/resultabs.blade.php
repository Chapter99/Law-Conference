@extends('backend.layouts.default_layout')
@section('title') ผลการประเมินบทคัดย่อ @parent @endsection

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
            <th class="text-pt-blue">ไฟล์บทคัดย่อ</th>
            <td><i class="far fa-file-word" aria-hidden="true"></i> <a
                    href="{{ asset('storage/abstract/'.$paper->abstract_word) }}" target="_blank">ไฟล์ Word</a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="far fa-file-pdf" aria-hidden="true"></i> <a
                    href="{{ asset('storage/abstract/'.$paper->abstract_pdf) }}" target="_blank">ไฟล์ Pdf</a>
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
      <h3 class="card-title">ผลการประเมินบทคัดย่อ</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
        @foreach ($paper->reviewer_abs as $reviewer)
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
                <td>2.1 บทคัดย่อภาษาไทยและภาษาอังกฤษมีความถูกต้องและเหมาะสม</td>
                <td class="text-center">{{ config('global.result')[$reviewer->pivot->s21] }}</td>
                <td>@if($reviewer->pivot->c21 == NULL)<small class="text-secondary"> -- ไม่มี -- </small>@else {{ $reviewer->pivot->c21 }}@endif</td>
              </tr>
              <tr>
                <td>2.2 บทคัดย่อครอบคลุมสาระสำคัญ ประกอบด้วย วัตถุประสงค์ วิธีการดำเนินงานวิจัย ผลการศึกษา ข้อเสนอแนะ</td>
                <td class="text-center">{{ config('global.result')[$reviewer->pivot->s22] }}</td>
                <td>@if($reviewer->pivot->c22 == NULL)<small class="text-secondary"> -- ไม่มี -- </small>@else {{ $reviewer->pivot->c22 }}@endif</td>
              </tr>
              <tr>
                <td>2.3 คำสำคัญสอดคล้องกับประเด็นการวิจัย</td>
                <td class="text-center">{{ config('global.result')[$reviewer->pivot->s23] }}</td>
                <td>@if($reviewer->pivot->c23 == NULL)<small class="text-secondary"> -- ไม่มี -- </small>@else {{ $reviewer->pivot->c23 }}@endif</td>
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
        <form method="POST" action="{{ route('backend.resultabs_save', $paper->id) }}" role="form" id="containerForm">
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
                  @if($paper->paper_status == 1 and $paper->reviewer_abs()->where('result','!=', 0)->count() == $paper->reviewer_abs()->count() and $paper->reviewer_abs()->count() != 0)
                  <button type="submit" name="Submit" class="btn btn-success" onclick="showLoading();">แจ้งผลการพิจารณาบทคัดย่อ</button>
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
