@extends('users.layouts.default_layout')
@section('title') ผลการประเมิน Poster/Infographic @parent @endsection

@section('content')

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header bg-secondary">
      <h3 class="card-title">ผลการประเมิน Poster/Infographic</h3>

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
          <th class="text-pt-blue">ผลการประเมิน</th>
          <td>
            @if($paper->result == 1)
            <span class="text-success"><i class="fas fa-check-square" aria-hidden="true"></i> ผ่าน โดยไม่มีการแก้ไข</span>
            @elseif($paper->result == 2)
            <span class="text-success"><i class="fas fa-check-square" aria-hidden="true"></i> ผ่าน โดยแก้ไขตามข้อเสนอแนะ</span>
            @elseif($paper->result == 3)
            <span class="text-danger"><i class="fas fa-times-circle" aria-hidden="true"></i> ไม่ผ่านการประเมิน</span>
            @endif
          </td>
        </tr>
      </table>
      @foreach ($paper->reviewer_poster as $reviewer)
      <table class="table table-hover">
        <tr class="bg-info">
          <th colspan="2" class="text-warning" style="width: 12%">ผู้ทรงคุณวุฒิ #{{ $loop->index +1 }}</th>
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
          <td colspan="3">1. ชื่อหัวข้อ</td>
        </tr>
        <tr>
          <td>1.1 ชื่อหัวข้อน่าสนใจ มีความถูกต้อง และเหมาะสม</td>
          <td class="text-center">{{ config('global.result')[$reviewer->pivot->s11] }}</td>
          <td>@if($reviewer->pivot->c11 == NULL)<small class="text-secondary"> -- ไม่มี -- </small>@else {{
            $reviewer->pivot->c11 }}@endif</td>
        </tr>
        <tr>
          <td colspan="3">2. เนื้อหาประกอบการนำเสนอ</td>
        </tr>
        <tr>
          <td>2.1 มีความน่าสนใจในการนำเสนอผลงาน ไม่ว่าจะเป็นการจัดวางรูปแบบ การนำเสนอ สัดส่วนที่เหมาะสมระหว่างภาพและเนื้อหา เป็นต้น</td>
          <td class="text-center">{{ config('global.result')[$reviewer->pivot->s21] }}</td>
          <td>@if($reviewer->pivot->c21 == NULL)<small class="text-secondary"> -- ไม่มี -- </small>@else {{
            $reviewer->pivot->c21 }}@endif</td>
        </tr>
        <tr>
          <td>2.2 มีเนื้อหาในการนำเสนอที่ถูกต้อง ครบถ้วน ชัดเจน</td>
          <td class="text-center">{{ config('global.result')[$reviewer->pivot->s22] }}</td>
          <td>@if($reviewer->pivot->c22 == NULL)<small class="text-secondary"> -- ไม่มี -- </small>@else {{
            $reviewer->pivot->c22 }}@endif</td>
        </tr>
        <tr>
          <td>2.3 เนื้อหาเป็นประโยชน์ต่อการเผยแพร่ต่อบุคคลภายนอก</td>
          <td class="text-center">{{ config('global.result')[$reviewer->pivot->s23] }}</td>
          <td>@if($reviewer->pivot->c23 == NULL)<small class="text-secondary"> -- ไม่มี -- </small>@else {{
            $reviewer->pivot->c23 }}@endif</td>
        </tr>
      </table>
      <table class="table">
        <tr>
          <td style="width: 12%">ข้อเสนอแนะอื่น ๆ</td>
          <td>@if($reviewer->pivot->comment == NULL)<small class="text-secondary"> -- ไม่มี -- </small>@else {{
            $reviewer->pivot->comment }}@endif</td>
        </tr>
        <tr>
          <td>ไฟล์แนบ</td>
          <td>@if($reviewer->pivot->filename == NULL)<small class="text-secondary"> -- ไม่มี -- </small>@else <a
              href="{{ asset('storage/review/'.$reviewer->pivot->filename) }}" target="_blank">ไฟล์แนบ</a>@endif</td>
        </tr>
      </table>
      @endif
      @endforeach
      <div class="row pt-3">
        <button type="button" class="btn btn-warning" onclick="history.back()">ย้อนกลับ</button>
    </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</section>
@endsection