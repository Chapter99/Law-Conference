@extends('backend.layouts.default_layout')
@section('title') หน้าหลัก @parent @endsection

@section('content')

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header bg-secondary">
      <h3 class="card-title">รายชื่อผู้ลงทะเบียน</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
        <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link" href="{{ url('backend/presentlist') }}">รายชื่อผู้ลงทะเบียนที่นำเสนอผลงาน</a></li>
            <li class="nav-item"><a class="nav-link active" href="{{ url('backend/participantlist') }}">รายชื่อผู้ลงทะเบียนที่ไม่นำเสนอผลงาน</a></li>
        </ul>
        @if(count($users))
        <table class="table table-hover">
            <tr class="bg-light">
                <th class="text-center text-pt-blue">ลำดับ</th>
                <th class="text-pt-blue">ชื่อ-สกุล</th>
                <th class="text-pt-blue">หน่วยงาน</th>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <td  class="text-center">{{ $loop->index +1 }}</td>
                    <td><a href="{{ route('backend.userprofile', $user->id) }}"> @if($user->academic != ""){{ $user->academic }}@else{{ $user->title }}@endif{{ $user->fname.' '.$user->lname }}</a></td>
                    <td>@if($user->university != ""){{ $user->university }} @else {{ $user->org }} @endif</td>
                </tr>
            @endforeach
        </table>
        @else
        <p class="text-center">-- ยังไม่มีผู้ลงทะเบียน --</p>
        @endif
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->


</section>
@endsection