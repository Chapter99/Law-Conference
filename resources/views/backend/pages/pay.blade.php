@extends('backend.layouts.default_layout')
@section('title') การชำระเงิน @parent @endsection

@section('content')

<!-- Main content -->
<section class="content">

    <!-- Default box -->
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
            <table class="table table-hover">
                <tr>
                    <th class="text-pt-blue" style="width: 15%">ชื่อ-สกุล</th>
                    <td>{{ $payment->user->title.$payment->user->fname.' '.$payment->user->lname }}</td>
                </tr>
                <tr>
                    <th class="text-pt-blue">ตำแหน่งทางวิชาการ</th>
                    <td>@if($payment->user->academic != ""){{ $payment->user->academic }}@else - @endif</td>
                </tr>
                <tr>
                    <th class="text-pt-blue">อีเมล</th>
                    <td>{{ $payment->user->email }}</td>
                </tr>
                <tr>
                    <th class="text-pt-blue">โทรศัพท์มือถือ</th>
                    <td>{{ $payment->user->tel }}</td>
                </tr>
                <tr>
                    <th class="text-pt-blue">รูปแบบผู้เข้าร่วม</th>
                    <td>{{ config('global.register_type')[$payment->user->register_type] }}</td>
                </tr>
                @if($payment->user->register_type == 3)
                <tr>
                    <th class="text-pt-blue">หน่วยงานภาคีเครือข่าย </th>
                    <td>{{ config('global.partner')[$payment->user->partner] }}</td>
                </tr>
                @endif
                @if($payment->user->register_type == 4)
                <tr>
                    <th class="text-pt-blue">บุคคลทั่วไป</th>
                    <td>{{ $payment->user->org }}</td>
                </tr>
                @endif
                <tr>
                    <th class="text-pt-blue">การนำเสนอผลงาน</th>
                    <td>{{ config('global.user_present')[$payment->user->present] }}</td>
                </tr>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!-- Default box -->
    <div class="card">
        <div class="card-header bg-secondary">
            <h3 class="card-title">การชำระเงิน</h3>

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
            <form method="POST" action="{{ route('backend.pay_save') }}" role="form" id="containerForm">
                @csrf
                <table class="table table-hover">
                    <tr>
                        <th class="text-pt-blue">ชื่อ-สกุล<br/>(สำหรับออกใบเสร็จ)</th>
                        <td>{{ $payment->user->fullname }}</td>
                    </tr>
                    <tr>
                        <th class="text-pt-blue">ที่อยู่</th>
                        <td>{{ $payment->user->address }}</td>
                    </tr>
                    <tr>
                        <th class="text-pt-blue">จังหวัด</th>
                        <td>{{ $payment->user->province }}</td>
                    </tr>
                    <tr>
                        <th class="text-pt-blue">รหัสไปรษณีย์</th>
                        <td>{{ $payment->user->postcode }}</td>
                    </tr>
                    <tr>
                        <th class="text-pt-blue" style="width: 15%">จำนวนเงินที่ชำระ</th>
                        <td><input type="number" name="amount" id="amount" value="{{ $payment->amount }}" required> บาท</td>
                    </tr>
                    <tr>
                        <th class="text-pt-blue">วันที่ชำระ</th>
                        <td>{{ date('d/m/Y', strtotime($payment->tdate)) }}</td>
                    </tr>
                    <tr>
                        <th class="text-pt-blue">หลักฐานการชำระเงิน</th>
                        <td><a href="{{ asset('storage/payment/'.$payment->filename) }}" target="_blank"><i
                                    class="fas fa-file-invoice-dollar"></i> หลักฐาน</a></td>
                    </tr>
                </table>
                <hr>
                <p class="text-primary font-weight-bold">ตรวจสอบการชำระเงิน</p>
                <div class="form-group row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <div class="radio">
                            <label>
                                <input type="radio" name="pay_status" id="pay_status1" value="1"
                                    @if($payment->pay_status == 1) checked @endif required>
                                รอการตรวจสอบยอดเงิน
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="pay_status" id="pay_status2" value="2"
                                    @if($payment->pay_status == 2) checked @endif required>
                                ชำระเงินเรียบร้อยแล้ว
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="comment" class="col-sm-1">หมายเหตุ</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="comment" id="comment" value="{{ $payment->comment }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-1">
                    </div>
                    <div class="col-sm-9">
                        <input type="hidden" name="id" value="{{ $payment->id }}">
                        <button type="submit" name="Submit" class="btn btn-success"
                            onclick="showLoading();">บันทึกสถานะการชำระเงิน</button>
                        <button type="button" class="btn btn-warning" onclick="history.back()">ย้อนกลับ</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <section id="loading">
        <div id="loading-content"></div>
    </section>

</section>
<script>
    function showLoading() {
  document.querySelector('#loading').classList.add('loading');
  document.querySelector('#loading-content').classList.add('loading-content');
}

function hideLoading() {
  document.querySelector('#loading').classList.remove('loading');
  document.querySelector('#loading-content').classList.remove('loading-content');
}
</script>
@endsection
