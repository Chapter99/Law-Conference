@extends('reviewers.layouts.default_layout')
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
      <h3 class="card-title">ขอเรียนเชิญท่านเป็นผู้ทรงคุณวุฒิประเมินคุณภาพผลงาน(บทคัดย่อ) บทความดังต่อไปนี้</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
        @if(!count($paper_not_accepts))
        <p class="text-center text-secondary">ไม่มีรายการผลงานที่รอตอบรับ/ปฏิเสธ ประเมินคุณภาพผลงาน(บทคัดย่อ)</p>
        @else
      <table class="table table-hover">
        @foreach ($paper_not_accepts as $paper)
            <tr>
              <td class="text-center">{{ $loop->index +1 }}</td>
              <td>{{ $paper->title }}</td>
              <td style="width: 15%"><a href="{{ route('reviewerlogin.accept_abs', $paper->id) }}" class="btn btn-outline-secondary btn-sm"><i class="fas fa-eye" aria-hidden="true"></i> ตอบรับ/ปฎิเสธ</a></td>
            </tr>
        @endforeach
      </table>
      @endif
    </div>
    <div class="card-footer"><a href="{{ route('reviewerlogin.pdf_abs') }}" target="_blank"><i class="fas fa-file-pdf"></i> หนังสือเชิญ</a></div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

    <!-- Default box -->
    <div class="card">
      <div class="card-header bg-secondary">
        <h3 class="card-title">การประเมินคุณภาพผลงาน(บทคัดย่อ)</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
      </div>
      <div class="card-body">
          @if(!count($paper_accepts))
          <p class="text-center  text-secondary">ยังไม่มีผลงานที่ท่าน<b>ตอบรับ</b>ประเมินคุณภาพผลงาน(บทคัดย่อ)</p>
          @else
        <table class="table table-hover">
          <tr class="bg-light">
            <th class="text-center">ลำดับ</th>
            <th class="text-center" style="width: 55%">ชื่อผลงาน</th>
            <th class="text-center">การนำเสนอ</th>
            <th class="text-center">Session</th>
            <th class="text-center">ประเมินผลงาน</th>
            <th class="text-center">สถานะ</th>
          </tr>
          @foreach ($paper_accepts as $paper)
              <tr>
                <td class="text-center">{{ $loop->index +1 }}</td>
                <td>{{ $paper->title }}</td>
                <td class="text-center">{{ $paper->present }}</td>
                <td class="text-center">{{ $paper->topic }}</td>
                <td class="text-center"><a href="{{ route('reviewerlogin.review_abs', $paper->id) }}" class="btn btn-outline-primary btn-sm"><i class="fas fa-star" aria-hidden="true"></i> ประเมิน</a></td>
                <td>
                  @if($paper->reviewer_abs()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->result == 1)
                  <span class="text-success"><i class="fas fa-check-square" aria-hidden="true"></i> สมควรนำเสนอ</span>
                  @elseif($paper->reviewer_abs()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->result == 2)
                  <span class="text-success"><i class="fas fa-check-square" aria-hidden="true"></i> สมควรนำเสนอหลังแก้ไข</span>
                  @elseif($paper->reviewer_abs()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->result == 3)
                  <span class="text-success"><i class="fas fa-check-square" aria-hidden="true"></i> สมควรนำเสนอเป็นโปสเตอร์</span>
                  @elseif($paper->reviewer_abs()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->result == 4)
                  <span class="text-danger"><i class="fas fa-times-circle" aria-hidden="true"></i> ไม่สมควรนำเสนอ</span>
                  @else
                  <span class="text-warning"><i class="fas fa-hourglass-start"></i> ยังไม่ประเมิน</span>
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
