@extends('frontend.layouts.default_layout')
@section('title') สถานที่ท่องเที่ยว @parent @endsection

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card border-primary">
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="mt-1 text-pt-orange text-center">กิจกรรมทัศนศึกษา</h4>
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-md-12">
                            <img src="{{ asset('assets/images/tours/1.jpg') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-md-12">
                            <img src="{{ asset('assets/images/tours/2.jpg') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-md-12">
                            <img src="{{ asset('assets/images/tours/3.jpg') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-md-12">
                            <img src="{{ asset('assets/images/tours/4.jpg') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-md-12">
                            <img src="{{ asset('assets/images/tours/5.jpg') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection