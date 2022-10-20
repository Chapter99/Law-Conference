@extends('users.layouts.default_layout')
@section('title') การแจ้งชำระเงิน @parent @endsection

@section('content')

<!-- Main content -->
<section class="content">

  <div class="card">
    <div class="card-header bg-secondary">
      <h3 class="card-title">การแจ้งชำระเงิน</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
      @if(count($payments))
      <p class="text-seconday text-center mt-3"> -- ท่านได้แจ้งชำระเงินเรียบร้อยแล้ว --</p>
      @else
      <form method="POST" action="{{ route('payment.store') }}" role="form" id="containerForm" enctype="multipart/form-data">
          @csrf
          {{-- <div class="form-group row">
              <label class="col-sm-2 text-right" for="title">จำนวนเงินที่ต้องชำระ</label>
              <div class="col-sm-10">
                  <p class="form-control-static"> <span>บาท</span></p>
              </div>
          </div> --}}
          <div class="form-group row">
              <label class="col-sm-2 text-right" for="amount">จำนวนที่ชำระ <span class="text-danger">*</span></label>
              <div class="col-sm-2">
                  <input type="number" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{ old('amount') }}" >
                  @error('amount')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
              <div class="col-sm-1">
                <p class="form-control-static"> บาท</p>
              </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 text-right" for="tdate">วันที่ชำระ <span class="text-danger">*</span></label>
            <div class="col-sm-3">
                <input type="date" class="form-control @error('tdate') is-invalid @enderror" id="tdate" name="tdate" value="{{ old('tdate') }}">
                @error('tdate')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-sm-6">
              <small id="passwordHelpInline" class="text-muted"><-- คลิกเลือกจากไอคอนปฏิทิน</small>
          </div>
        </div>
          <div class="form-group row">
              <label class="col-sm-2 text-right" for="filename">ไฟล์หลักฐานการชำระเงิน <span class="text-danger">*</span></label>
              <div class="col-sm-6">
                  <input type="file" class="form-control @error('filename') is-invalid @enderror" id="filename" name="filename">
                  @error('filename')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
              <div class="col-sm-4">
                  <small id="passwordHelpInline" class="text-muted">ไฟล์ .pdf, .jpg หรือ .png ขนาดไม่เกิน 30 MB</small>
              </div>
          </div>
          <div class="form-group row">
              <label class="col-sm-2"></label>
              <div class="col-sm-3">
              <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                  <button type="submit" name="Submit" class="btn btn-primary" onclick="showLoading();">แจ้งชำระเงิน</button>
              </div>
          </div>
      </form>
      @endif
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</section>
@endsection
