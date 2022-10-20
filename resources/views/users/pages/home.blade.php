@extends('users.layouts.default_layout')
@section('title') หน้าหลัก @parent @endsection

@section('content')

<!-- Main content -->
<section class="content">
  @if($message = Session::get('success'))
  <div class="alert alert-success text-center" role="alert">
    {{ $message }}
  </div>
  @endif

  <!-- Default box -->
  <div class="card">
    <div class="card-header bg-secondary">
      <h3 class="card-title">รายการผลงาน</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
      
      @if(count($papers))
      <table class="table table-hover">
        <tr class="bg-light">
          <th class="text-center">ชื่อเรื่อง</th>
          {{-- <th class="text-center">เซสชั่น</th>
          <th class="text-center">การนำเสนอ</th> --}}
          <th class="text-center">สถานะ</th>
          <th class="text-right" style="width: 32%">จัดการ</th>
        </tr>
        @foreach ($papers as $paper)
        <tr>
          <td>{{ $paper->title }}<br><small class="text-secondary">นำเสนอ : </small><small class="text-primary">{{ config('global.present')[$paper->present] }}</small><small class="text-secondary"> เซสชั่น : </small><small class="text-primary">{{ $paper->topic }}</small></td>
          {{-- <td class="text-center">{{ $paper->topic }}</td>
          <td class="text-center">{{ config('global.present')[$paper->present] }}</td> --}}
          <td class="text-center text-primary">{{ config('global.status')[$paper->paper_status] }}</td>
          <td class="project-actions text-right">
            <a class="btn btn-primary btn-sm" href="{{ route('papers.show', $paper->id) }}"> <i class="fas fa-eye"></i> รายละเอียด</a>
            @if($paper->result > 0)
              @if($paper->present == 1)
              <a class="btn btn-warning btn-sm" href="{{ route('users.result_full', $paper->id) }}"> <i class="fas fa-star-half-alt"></i> ผลการประเมิน</a>
              @elseif($paper->present == 2)
              <a class="btn btn-warning btn-sm" href="{{ route('users.result_abs', $paper->id) }}"> <i class="fas fa-star-half-alt"></i> ผลการประเมิน</a>
              @elseif($paper->present == 3)
              <a class="btn btn-warning btn-sm" href="{{ route('users.result_poster', $paper->id) }}"> <i class="fas fa-star-half-alt"></i> ผลการประเมิน</a>
              @endif
            @endif
            @if($paper->result > 0 and $paper->result < 3)
            <a class="btn btn-danger btn-sm" href="{{ route('users.upload_paper', $paper->id) }}"> <i class="fas fa-upload"></i> อัพโหลดไฟล์</a>
            @endif
            @if($paper->paper_status == 1)
            <a class="btn btn-info btn-sm" href="{{ route('papers.edit', $paper->id) }}"><i class="fas fa-pencil-alt"></i> แก้ไข</a>
            @endif
          </td>
        </tr>
        @endforeach
      </table>
      @else
        <p class="text-center text-warning">-- ท่านยังไม่ส่งผลงาน --</p>
      @endif
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

  <div class="card">
    <div class="card-header bg-secondary">
      <h3 class="card-title">การชำระเงิน</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
        @if(!count($payments))
        <p class="text-seconday text-center"> -- ยังไม่มีรายการแจ้งชำระเงิน --</p>
        @else
        <table class="table">
            <tr class="bg-light">
                <th class="text-center">จำนวนเงินที่ชำระ</th>
                <th class="text-center">วันที่ชำระ</th>
                <th class="text-center">หลักฐานการชำระเงิน</th>
                <th class="text-center">สถานะการชำระเงิน</th>
                <th class="text-right">จัดการ</th>
            </tr>
            @foreach ($payments as $payment)
                <tr>
                    <td class="text-center">{{ number_format($payment->amount, 2) }} บาท</td>
                    <td class="text-center">{{ date('d/m/Y', strtotime($payment->tdate)) }}</td>
                    <td class="text-center"><a href="{{ asset('storage/payment/'.$payment->filename) }}" target="_blank"><i class="fas fa-file-invoice-dollar"></i> หลักฐาน</a></td>
                    <td class="text-center">
                        @if($payment->pay_status == 2)
                        <span class="text-success"><i class="fas fa-check-square"></i> ชำระเงินเรียบร้อยแล้ว</span>
                        @elseif($payment->pay_status == 1)
                        <span class="text-warning"><i class="fas fa-hourglass-start"></i> รอการตรวจสอบยอดเงิน</span>
                        @endif
                    </td>
                    <td class="text-right">
                        @if($payment->pay_status == 1)
                        <a class="btn btn-primary btn-sm" href="{{ route('users.payment_edit', $payment->id) }}"> <i class="fas fa-edit"></i> แก้ไข</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
        @endif
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</section>
@endsection
