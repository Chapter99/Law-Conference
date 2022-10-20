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
        <table class="table">
            <tr>
                <th class="text-pt-blue" style="width: 15%">ชื่อ-สกุล</th>
                <td>{{ $user->title.$user->fname.' '.$user->lname }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-outline-primary btn-sm" href="{{ route('backend.addPayment', $user->id) }}"><i class="fas fa-dollar"></i> ชำระเงิน</a></td>
            </tr>
            <tr>
                <th class="text-pt-blue">ตำแหน่งทางวิชาการ</th>
                <td>@if($user->academic != ""){{ $user->academic }}@else - @endif</td>
            </tr>
            <tr>
                <th class="text-pt-blue">อีเมล</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th class="text-pt-blue">ที่อยู่</th>
                <td>{{ $user->address }}</td>
            </tr>
            <tr>
                <th class="text-pt-blue">จังหวัด</th>
                <td>{{ $user->province }}</td>
            </tr>
            <tr>
                <th class="text-pt-blue">รหัสไปรษณีย์</th>
                <td>{{ $user->postcode }}</td>
            </tr>
            <tr>
                <th class="text-pt-blue">โทรศัพท์มือถือ</th>
                <td>{{ $user->tel }}</td>
            </tr>
            <tr>
                <th class="text-pt-blue">รูปแบบผู้เข้าร่วม</th>
                <td>{{ config('global.register_type')[$user->register_type] }}</td>
            </tr>
            @if($user->register_type == 3)
            <tr>
                <th class="text-pt-blue">หน่วยงานภาคีเครือข่าย </th>
                <td>{{ config('global.partner')[$user->partner] }}</td>
            </tr>
            @endif
            @if($user->register_type == 4)
            <tr>
                <th class="text-pt-blue">บุคคลทั่วไป</th>
                <td>{{ $user->org }}</td>
            </tr>
            @endif
            <tr>
                <th class="text-pt-blue">การนำเสนอผลงาน</th>
                <td>{{ config('global.user_present')[$user->present] }}</td>
            </tr>
        </table>
        <a href="{{ url('backend/presentlist') }}" class="btn btn-success">ย้อนกลับ</a>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->


</section>
@endsection
