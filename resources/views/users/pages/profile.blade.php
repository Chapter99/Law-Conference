@extends('users.layouts.default_layout')
@section('title') ข้อมูลการลงทะเบียน @parent @endsection

@section('content')

<!-- Main content -->
<section class="content">
    @if($message = Session::get('success'))
    <div class="alert alert-success text-center" role="alert">
      {{ $message }}
    </div>
    @endif
    <div class="card">
        <div class="card-header bg-secondary">
            <h3 class="card-title">ข้อมูลการลงทะเบียน</h3>

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
            <table class="table">
                <tr>
                    <th class="text-pt-blue" style="width: 18%">ชื่อ-สกุล</th>
                    <td>{{ Auth::user()->title.Auth::user()->fname.' '.Auth::user()->lname }}</td>
                </tr>
                <tr>
                    <th class="text-pt-blue">ตำแหน่งทางวิชาการ</th>
                    <td>@if(Auth::user()->academic != ""){{ Auth::user()->academic }}@else - @endif</td>
                </tr>
                <tr>
                    <th class="text-pt-blue">ที่อยู่</th>
                    <td>{{ Auth::user()->address }}</td>
                </tr>
                <tr>
                    <th class="text-pt-blue">จังหวัด</th>
                    <td>{{ Auth::user()->province }}</td>
                </tr>
                <tr>
                    <th class="text-pt-blue">รหัสไปรษณีย์</th>
                    <td>{{ Auth::user()->postcode }}</td>
                </tr>
                <tr>
                    <th class="text-pt-blue">โทรศัพท์มือถือ</th>
                    <td>{{ Auth::user()->tel }}</td>
                </tr>
                <tr>
                    <th class="text-pt-blue">รูปแบบผู้เข้าร่วม</th>
                    <td>{{ config('global.register_type')[Auth::user()->register_type] }}</td>
                </tr>
                @if(Auth::user()->register_type == 3)
                <tr>
                    <th class="text-pt-blue">หน่วยงานภาคีเครือข่าย </th>
                    <td>{{ config('global.partner')[Auth::user()->partner] }}</td>
                </tr>
                @endif
                @if(Auth::user()->register_type == 4)
                <tr>
                    <th class="text-pt-blue">บุคคลทั่วไป</th>
                    <td>{{ Auth::user()->org }}</td>
                </tr>
                @endif
                <tr>
                    <th class="text-pt-blue">การนำเสนอผลงาน</th>
                    <td>{{ config('global.user_present')[Auth::user()->present] }}</td>
                </tr>
            </table>
            <div class="mt-3">
                <a href="{{ route('profile.edit') }}" class="btn btn-warning">แก้ไขข้อมูลการลงทะเบียน</a>
                <a href="{{ route('users.home') }}" class="btn btn-success">กลับหน้าหลัก</a>
            </div>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</section>
@endsection
