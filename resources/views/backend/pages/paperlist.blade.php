@extends('backend.layouts.default_layout')
@section('title') รายการผลงาน @parent @endsection

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
        <div class="row">
            <div class="col-4">
              <form action="{{ route('backend.paperlist') }}" method="GET" id="myForm">
                <select name="topic" id="topic" class="form-control" onchange="document.getElementById('myForm').submit();">
                  <option value="">--- ทั้งหมด ---</option>
                  @foreach ($topics as $topic)
                      <option value="{{ $topic->id }}" @if($topic->id == $selected) selected @endif>{{ $topic->id.") ".$topic->name }}</option>
                  @endforeach
                </select>
              </form>
            </div>
          </div>
        <table class="table mt-3">
            <tr class="bg-light">
                <th style="width: 5%">ID</th>
                <th style="width: 35%">ชื่อบทความ</th>
                <th class="text-center">นำเสนอ</th>
                <th class="text-center">เซสชั่น</th>
                <th class="text-center" style="width: 12%">ผลประเมิน</th>
                <th class="text-center" style="width: 10%">ส่งฉบับแก้ไข</th>
                {{-- <th class="text-center" style="width: 10%">นำเสนอ</th>
                <th class="text-center" style="width: 12%">ผลเรื่องเต็ม</th>
                <th class="text-center" style="width: 12%">ไฟล์โปสเตอร์</th> --}}
                <th class="text-center" style="width: 10%">ชำระเงิน</th>
                {{-- <th class="text-center" style="width: 8%">ส่งเรื่องเต็ม</th> --}}
            </tr>
            @foreach ($papers as $paper)
            <tr>
                <td>{{ $paper->id }}</td>
                <td><a href="{{ route('backend.paperdetail', $paper->id) }}">{{ $paper->title }}</a><br><small class="text-secondary">@if(isset($paper->user['academic'])){{ $paper->user['academic'] }}@endif @if(isset($paper->user['fname'])){{ $paper->user['fname'].' '.$paper->user['lname'] }}@endif</small></td>
                <td class="text-center">{{ config('global.present')[$paper->present] }}</td>
                <td class="text-center">{{ $paper->topics->name }}</td>
                <td class="text-center">
                  @if($paper->result > 0)
                    @if($paper->present == 1)
                      <a class="btn btn-outline-secondary btn-sm small" href="{{ route('backend.resultfull', $paper->id) }}"><i class="fas fa-envelope-open-text"></i> แจ้งผลแล้ว</a><br>
                    @elseif($paper->present == 2)
                      <a class="btn btn-outline-secondary btn-sm small" href="{{ route('backend.resultabs', $paper->id) }}"><i class="fas fa-envelope-open-text"></i> แจ้งผลแล้ว</a><br>
                    @else 
                      <a class="btn btn-outline-secondary btn-sm small" href="{{ route('backend.resultposter', $paper->id) }}"><i class="fas fa-envelope-open-text"></i> แจ้งผลแล้ว</a><br>
                    @endif
                  @else
                    @if($paper->present == 1)
                      <a class="btn btn-outline-primary btn-sm small" href="{{ route('backend.resultfull', $paper->id) }}"><i class="fas fa-tachometer-alt"></i> ผลประเมิน</a><br>
                    @elseif($paper->present == 2)
                      <a class="btn btn-outline-primary btn-sm small" href="{{ route('backend.resultabs', $paper->id) }}"><i class="fas fa-tachometer-alt"></i> ผลประเมิน</a><br>
                    @else
                      <a class="btn btn-outline-primary btn-sm small" href="{{ route('backend.resultposter', $paper->id) }}"><i class="fas fa-tachometer-alt"></i> ผลประเมิน</a><br>
                    @endif
                  @endif
                  <small class="text-secondary">ประเมินแล้ว : 
                    @if($paper->present == 1)
                    {{ $paper->reviewer_full()->where('result','!=', 0)->count() }}/{{ $paper->reviewer_full()->count() }}
                    @elseif($paper->present == 2)
                    {{ $paper->reviewer_abs()->where('result','!=', 0)->count() }}/{{ $paper->reviewer_abs()->count() }}
                    @else 
                    {{ $paper->reviewer_poster()->where('result','!=', 0)->count() }}/{{ $paper->reviewer_poster()->count() }}
                    @endif
                  </small>
                </td>
                <td class="text-center">
                  @if($paper->result == 2)
                    @if($paper->paper_status == 3)
                    <span class="text-success small"><i class="fas fa-check-double"></i> ส่งแล้ว</span>
                    @else
                    <span class="text-danger small"><i class="fas fa-times-circle"></i> ยังไม่ส่ง</span>
                    @endif
                  @else 
                    -
                  @endif
                </td>
                {{-- <td class="text-center">
                  @if($paper->publish == 2)
                    @if($paper->result_full > 0)
                    <a class="btn btn-outline-secondary btn-sm" href="{{ route('backend.resultfull', $paper->id) }}"><i class="fas fa-envelope-open-text"></i> แจ้งผลแล้ว</a><br>
                    @else
                    <a class="btn btn-outline-primary btn-sm" href="{{ route('backend.resultfull', $paper->id) }}"><i class="fas fa-tachometer-alt"></i> ผลประเมิน</a><br>
                    @endif
                    <small class="text-secondary">ประเมินแล้ว : {{ $paper->reviewer_full()->where('result','!=', 0)->count() }}/{{ $paper->reviewer_full()->count() }}</small>
                  @else 
                    <span class="small text-secondary">-</span> 
                  @endif
                </td>
                <td class="text-center">
                  @if($paper->present == 'Poster')
                    @if(!$paper->hasPoster)
                      <a class="btn btn-outline-warning btn-sm" href="{{ route('backend.hasPoster', [$paper->id, 1]) }}"><i class="fas fa-times-circle"></i> ยังไม่ส่ง</a>
                    @else
                      <a class="btn btn-outline-success btn-sm" href="{{ route('backend.hasPoster', [$paper->id, 0]) }}"><i class="fas fa-check-square"></i> ส่งแล้ว</a>
                    @endif
                  @else 
                  -
                  @endif
                </td> --}}
                <td class="text-center">
                    @if($paper->payment()->where('user_id', $paper->user_id)->exists() and $paper->payment()->where('user_id', $paper->user_id)->first()->pay_status == 2 ) <span class="text-success small"><i class="fas fa-check-circle"></i> ชำระแล้ว </span>
                    @elseif($paper->payment()->where('user_id', $paper->user_id)->exists() and $paper->payment()->where('user_id', $paper->user_id)->first()->pay_status == 1 ) <span class="text-warning small"><i class="fas fa-cash-register"></i> รอตรวจสอบ </span>
                    @else <span class="text-danger small"><i class="fas fa-times-circle"></i> ยังไม่ชำระ </span>
                    @endif
                </td>
                {{-- <td class="text-center">
                  @if($paper->publish == 2)
                    @if($paper->fullpaper_word != NULL)<span class="text-success small"><i class="fas fa-check-circle"></i> ส่งแล้ว </span>
                    @else <span class="text-danger small"><i class="fas fa-times-circle"></i> ยังไม่ส่ง </span>
                    @endif
                  @else 
                    <span class="text-secondary text-center small"> - </span>
                  @endif
                </td> --}}
            </tr>
            @endforeach
        </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->


</section>
@endsection
