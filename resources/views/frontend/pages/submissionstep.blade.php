@extends('frontend.layouts.default_layout')
@section('title') Home @parent @endsection

@section('content')
<div class="container mt-5 pt-4">
    <div class="card">
        <div class="card-header bg-pt-purple text-light">ขั้นตอนการส่งผลงาน</div>
        <div class="card-body">
            <ol>
                <li>นักวิจัยลงทะเบียน (<a href="{{ url('register') }}">คลิกที่นี่</a>) กรอกข้อมูลให้ครบ แล้วคลิกลงทะเบียน</li>
                <li>ระบบจะแสดงหน้าสำหรับนักวิจัยสามารถส่งผลงาน ตรวจสอบสถานะผลงาน</li>
            </ol>
        </div>
    </div>

</div>
@endsection
