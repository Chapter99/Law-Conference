@extends('backend.layouts.default_layout')
@section('title') รายการชำระเงิน @parent @endsection

@section('content')

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header bg-secondary">
      <h3 class="card-title">รายการชำระเงิน</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
        <table class="table">
            <tr class="bg-light">
                <th class="text-center">ลำดับ</th>
                <th class="text-center">ID</th>
                <th class="text-center">ชื่อ-สกุล</th>
                <th class="text-center">ประเภทบุคคล</th>
                <th class="text-center">ชำระ</th>
                <th class="text-center">วันที่ชำระ</th>
                <th class="text-center" style="width: 16%">สถานะ</th>
            </tr>
            @foreach ($payments as $payment)
            <tr>
                <td class="text-center">{{ $loop->index +1 }}</td>
                <td class="text-center">{{ $payment->user_id }}</td>
                <td>{{ $payment->user->fname." ".$payment->user->lname }}</td>
                <td class="text-center">@if($payment->user->join_type == 1)ภายใน @else ภายนอก @endif</td>
                <td class="text-center">{{ number_format($payment->amount) }} บาท</td>
                <td class="text-center">{{ date('d/m/Y', strtotime($payment->tdate)) }}</td>
                <td class="text-center">
                  @if($payment->pay_status == 1)
                  <a class="btn btn-outline-warning btn-sm" href="{{ route('backend.pay', $payment->id) }}"><i class="fas fa-cash-register"></i> รอตรวจสอบ</a>
                  @else
                  <a class="btn btn-outline-success btn-sm" href="{{ route('backend.pay', $payment->id) }}"><i class="fas fa-check-circle"></i> ตรวจสอบแล้ว</a>
                  @endif
                </td>
            </tr>
            @endforeach
            @if(count($payments) ==0)
            <tr>
                <td class="text-secondary text-center" colspan="7">-- ไม่มีรายการชำระเงิน --</td>
            </tr>
            @endif
        </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->


</section>
@endsection
