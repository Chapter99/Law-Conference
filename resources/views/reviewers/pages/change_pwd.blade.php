@extends('reviewers.layouts.default_layout')
@section('title') เปลี่ยนรหัสผ่าน @parent @endsection

@section('content')

<!-- Main content -->
<section class="content">
    @if($message = Session::get('error'))
    <div class="alert alert-danger text-center" role="alert">
      {{ $message }}
    </div>
    @endif
    <!-- Default box -->
  <div class="card">
    <div class="card-header bg-secondary">
      <h3 class="card-title">เปลี่ยนรหัสผ่าน</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('reviewerlogin.change_pwd') }}" role="form" id="containerForm">
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 text-right" for="old">รหัสผ่านปัจจุบัน </label>
                <div class="col-sm-3">
                    <input class="form-control" type="password" name="old" id="old" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 text-right" for="pwd1">รหัสผ่านใหม่ </label>
                <div class="col-sm-3">
                    <input class="form-control" type="password" name="pwd1" id="pwd1" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 text-right" for="pwd2">ยืนยันรหัสผ่าน </label>
                <div class="col-sm-3">
                    <input class="form-control" type="password" name="pwd2" id="pwd2" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-8 offset-sm-2">
                    <button type="submit" name="Submit" class="btn btn-primary">เปลี่ยนรหัสผ่าน</button>&nbsp;&nbsp;&nbsp;
                    <a class="btn btn-warning" href="{{ url('reviewers/')}}">ยกเลิก</a>
                </div>
            </div>
        </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</section>
@endsection
