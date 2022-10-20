@extends('frontend.layouts.default_layout')
@section('title') Home @parent @endsection

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card border-primary">
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="mt-1 text-pt-orange text-center">สถานที่จัดงาน</h4>
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-md-12">
                            <h5 class="text-primary text-center text-primary">มหาวิทยาลัยทักษิณ วิทยาเขตพัทลุง</h5>
                            <p class="text-center">222 หมู่ 2 ตำบลบ้านพร้าว อำเภอป่าพะยอม จังหวัดพัทลุง 93210</p>
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-md-6">
                            <img src="{{ asset('assets/images/pic1.jpg') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset('assets/images/pic2.jpg') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-md-6">
                            <img src="{{ asset('assets/images/pic3.jpg') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset('assets/images/pic4.jpg') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-md-6">
                            <img src="{{ asset('assets/images/pic5.jpg') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset('assets/images/pic6.jpg') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16616.558046646114!2d99.93634276564548!3d7.808636726006743!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x305287a57f46a313%3A0xf0223bd0b5f3070!2sThaksin%20University%2C%20Phatthalung%20Campus!5e0!3m2!1sen!2sth!4v1631111789364!5m2!1sen!2sth"
                                allowfullscreen></iframe>
                        </div>

                    </div>
                    <div class="row pt-4">
                        <div class="col-md-12">
                            <h5 class="text-primary">มีรถบริการรับ-ส่ง</h5>
                            <ul>
                                <li>สนามบินหาดใหญ่ อ.หาดใหญ่ จ.สงขลา</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection