@extends('backend.layouts.default_layout')
@section('title') รายละเอียดผู้ลงทะเบียน @parent @endsection

@section('content')

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header bg-secondary">
      <h3 class="card-title">รายละเอียดผู้ลงทะเบียน</h3>

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
                <th class="text-pt-blue" style="width: 23%">ชื่อบทความ</th>
                <td style="width: 80%">{{ $paper->title }}</td>
            </tr>
            <tr>
                <th class="text-pt-blue">ผู้ส่ง</th>
                <td>@if($paper->user->academic != ""){{ $paper->user->academic }}@else{{ $paper->user->title }}@endif{{ $paper->user->fname.' '.$paper->user->lname }}</td>
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
                <th class="text-pt-blue">Section</th>
                <td>{{ $paper->topic.') '.$paper->topics->name }}</td>
            </tr>
            @if($paper->abstract_word != "" and $paper->present == 2)
            <tr>
                <th class="text-pt-blue">ไฟล์บทคัดย่อ</th>
                <td><i class="far fa-file-word" aria-hidden="true"></i> <a href="{{ asset('storage/abstract/'.$paper->abstract_word) }}" target="_blank">ไฟล์ Word</a>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="far fa-file-pdf" aria-hidden="true"></i> <a href="{{ asset('storage/abstract/'.$paper->abstract_pdf) }}" target="_blank">ไฟล์ Pdf</a></td>
            </tr>
            @endif
            @if($paper->abstract_word2 != "" and $paper->present == 2)
            <tr>
              <th class="text-pt-blue">ไฟล์บทคัดย่อ <small class="text-danger">(ฉบับแก้ไข)</small></th>
              <td><i class="far fa-file-word" aria-hidden="true"></i> <a href="{{ asset('storage/abstract/'.$paper->abstract_word2) }}" target="_blank">ไฟล์ Word</a>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="far fa-file-pdf" aria-hidden="true"></i> <a href="{{ asset('storage/abstract/'.$paper->abstract_pdf2) }}" target="_blank">ไฟล์ Pdf</a></td>
            </tr>
            @endif
            @if($paper->fullpaper_word != "" and $paper->present == 1)
            <tr>
              <th class="text-pt-blue">ไฟล์บทความฉบับเต็ม</th>
              <td><i class="far fa-file-word" aria-hidden="true"></i> <a href="{{ asset('storage/fullpaper/'.$paper->fullpaper_word) }}" target="_blank">ไฟล์ Word</a>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="far fa-file-pdf" aria-hidden="true"></i> <a href="{{ asset('storage/fullpaper/'.$paper->fullpaper_pdf) }}" target="_blank">ไฟล์ Pdf</a></td>
            </tr>
            @endif
            @if($paper->fullpaper_word2 != "" and $paper->present == 1)
            <tr>
              <th class="text-pt-blue">ไฟล์บทความฉบับเต็ม <small class="text-danger">(ฉบับแก้ไข)</small></th>
              <td><i class="far fa-file-word" aria-hidden="true"></i> <a href="{{ asset('storage/fullpaper/'.$paper->fullpaper_word2) }}" target="_blank">ไฟล์ Word</a>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="far fa-file-pdf" aria-hidden="true"></i> <a href="{{ asset('storage/fullpaper/'.$paper->fullpaper_pdf2) }}" target="_blank">ไฟล์ Pdf</a></td>
            </tr>
            @endif
            @if($paper->poster != "" and $paper->present == 3)
            <tr>
              <th class="text-pt-blue">ไฟล์ Poster/Infographic</th>
              <td><i class="far fa-file-image" aria-hidden="true"></i> <a href="{{ asset('storage/poster/'.$paper->poster) }}" target="_blank">ไฟล์ Poster/Infographic</a> </td>
            </tr>
            @endif
            @if($paper->poster2 != "" and $paper->present == 3)
            <tr>
              <th class="text-pt-blue">ไฟล์ Poster/Infographic <small class="text-danger">(ฉบับแก้ไข)</small></th>
              <td><i class="far fa-file-image" aria-hidden="true"></i> <a href="{{ asset('storage/poster/'.$paper->poster2) }}" target="_blank">ไฟล์ Poster/Infographic</a> </td>
            </tr>
            @endif
        </table>
        <div class="mt-3">
            <button type="button" class="btn btn-warning" onclick="history.back()">ย้อนกลับ</button>
        </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->


</section>
@endsection