@extends('users.layouts.default_layout')
@section('title') ข้อมูลการออกใบเสร็จรับเงิน @parent @endsection

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
            <h3 class="card-title">ข้อมูลการออกใบเสร็จรับเงิน</h3>

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
            <form method="POST" action="{{ route('users.receiptDataSave') }}" role="form" id="containerForm">
                @csrf
                <p class="text-primary">กรุณาตรวจสอบ ชื่อ-สกุล และที่อยู่ สำหรับการออกใบเสร็จรับเงิน</p>
                <div class="form-group row">
                    <label class="col-sm-1 text-right" for="fullname">ชื่อ-สกุล</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control @error('fullname') is-invalid @enderror" id="fullname" name="fullname" value="{{ $user->fullname }}">
                        @error('fullname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-1 text-right" for="address">ที่อยู่</label>
                    <div class="col-sm-5">
                        <textarea class="form-control" id="address" name="address" rows="5">{{ $user->address }}</textarea>
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-1 text-right" for="province">จังหวัด</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control @error('province') is-invalid @enderror" id="province" name="province" value="{{ $user->province }}">
                        @error('province')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-1 text-right" for="postcode">รหัสไปรษณีย์</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control @error('postcode') is-invalid @enderror" id="postcode" name="postcode" value="{{ $user->postcode }}">
                        @error('postcode')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-1"></label>
                    <div class="col-sm-3">
                        <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                        <button type="submit" name="Submit" class="btn btn-primary"
                            onclick="showLoading();">ปรับปรุงข้อมูลใบเสร็จรับเงิน</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
@endsection
