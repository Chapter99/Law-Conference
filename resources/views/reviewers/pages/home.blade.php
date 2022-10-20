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
        <h3 class="card-title">การประเมินคุณภาพผลงาน</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
      </div>
      <div class="card-body">
          @if(!count($full_paper) and !count($abs_paper) and !count($poster_paper))
          <p class="text-center  text-secondary">ยังไม่มีผลงาน ที่ให้ท่านประเมิน</p>
          @else
        <table class="table table-hover">
          <tr>
            <th class="text-center">ลำดับ</th>
            <th class="text-center" style="width: 55%">ชื่อผลงาน</th>
            <th class="text-center">ประเมินผลงาน</th>
            <th class="text-center">สถานะ</th>
          </tr>
          @if(count($full_paper))
          <tr class="bg-light">
            <td colspan="4" class="text-success">บทความฉบับเต็ม</td>
          </tr>
          @endif
          @foreach ($full_paper as $paper)
              <tr>
                <td class="text-center">{{ $loop->index +1 }}</td>
                <td>{{ $paper->title }}<br><small class="text-secondary">สาขา : </small><small class="text-primary">{{ $paper->topics->name }}</small></td>
                <td class="text-center"><a href="{{ route('reviewerlogin.review_full', $paper->id) }}" class="btn btn-outline-primary btn-sm"><i class="fas fa-star" aria-hidden="true"></i> ประเมิน</a></td>
                <td>
                  @if($paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->result == 1)
                  <span class="text-success"><i class="fas fa-check-square" aria-hidden="true"></i> ผ่าน โดยไม่มีการแก้ไข</span>
                  @elseif($paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->result == 2)
                  <span class="text-success"><i class="fas fa-check-square" aria-hidden="true"></i> ผ่าน โดยแก้ไขตามข้อเสนอแนะ</span>
                  @elseif($paper->reviewer_full()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->result == 3)
                  <span class="text-danger"><i class="fas fa-times-circle" aria-hidden="true"></i> ไม่ผ่านการประเมิน</span>
                  @else
                  <span class="text-warning"><i class="fas fa-hourglass-start"></i> ยังไม่ประเมิน</span>
                  @endif
                </td>
              </tr>
          @endforeach
          @if(count($abs_paper))
          <tr class="bg-light">
            <td colspan="4" class="text-success">บทคัดย่อ</td>
          </tr>
          @endif
          @foreach ($abs_paper as $paper)
              <tr>
                <td class="text-center">{{ $loop->index +1 }}</td>
                <td>{{ $paper->title }}<br><small class="text-secondary">สาขา : </small><small class="text-primary">{{ $paper->topics->name }}</small></td>
                <td class="text-center"><a href="{{ route('reviewerlogin.review_abs', $paper->id) }}" class="btn btn-outline-primary btn-sm"><i class="fas fa-star" aria-hidden="true"></i> ประเมิน</a></td>
                <td>
                  @if($paper->reviewer_abs()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->result == 1)
                  <span class="text-success"><i class="fas fa-check-square" aria-hidden="true"></i> ผ่าน โดยไม่มีการแก้ไข</span>
                  @elseif($paper->reviewer_abs()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->result == 2)
                  <span class="text-success"><i class="fas fa-check-square" aria-hidden="true"></i> ผ่าน โดยแก้ไขตามข้อเสนอแนะ</span>
                  @elseif($paper->reviewer_abs()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->result == 3)
                  <span class="text-danger"><i class="fas fa-times-circle" aria-hidden="true"></i> ไม่ผ่านการประเมิน</span>
                  @else
                  <span class="text-warning"><i class="fas fa-hourglass-start"></i> ยังไม่ประเมิน</span>
                  @endif
                </td>
              </tr>
          @endforeach
          @if(count($poster_paper))
          <tr class="bg-light">
            <td colspan="4" class="text-success">Poster/Infographic</td>
          </tr>
          @endif
          @foreach ($poster_paper as $paper)
              <tr>
                <td class="text-center">{{ $loop->index +1 }}</td>
                <td>{{ $paper->title }}<br><small class="text-secondary">สาขา : </small><small class="text-primary">{{ $paper->topics->name }}</small></td>
                <td class="text-center"><a href="{{ route('reviewerlogin.review_poster', $paper->id) }}" class="btn btn-outline-primary btn-sm"><i class="fas fa-star" aria-hidden="true"></i> ประเมิน</a></td>
                <td>
                  @if($paper->reviewer_poster()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->result == 1)
                  <span class="text-success"><i class="fas fa-check-square" aria-hidden="true"></i> ผ่าน โดยไม่มีการแก้ไข</span>
                  @elseif($paper->reviewer_poster()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->result == 2)
                  <span class="text-success"><i class="fas fa-check-square" aria-hidden="true"></i> ผ่าน โดยแก้ไขตามข้อเสนอแนะ</span>
                  @elseif($paper->reviewer_poster()->where('rev_id', Auth::guard('reviewer')->user()->id)->first()->pivot->result == 3)
                  <span class="text-danger"><i class="fas fa-times-circle" aria-hidden="true"></i> ไม่ผ่านการประเมิน</span>
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
