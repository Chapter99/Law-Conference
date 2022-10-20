@extends('backend.layouts.default_layout')
@section('title') ประเมินบทความฉบับเต็ม @parent @endsection

@section('content')

<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="card">
    <div class="card-header bg-secondary">
      <h3 class="card-title">ประเมินบทความฉบับเต็ม : {{ $reviewer->title.$reviewer->fname." ".$reviewer->lname }}</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
      <form method="POST" action="{{ route('reviewers.review_full_save') }}" role="form" id="containerForm">
        @csrf
        <table class="table table-hover mt-3">
            <tr class="bg-light">
                <th>ID</th>
                <th>ชื่อเรื่อง</th>
                <th class="text-center">Present</th>
                <th class="text-center">Session</th>
                <th class="text-center">จำนวนกรรมการ</th>
                <th class="text-center" style="width: 10%">ประเมิน</th>
            </tr>
            @foreach ($papers as $paper)
                @if($paper->present == 1)
                <tr>
                    <td>{{ $paper->id }}</td>
                    <td>{{ $paper->title }}<br /><span class="text-primary small">@if(isset($paper->user['fname'])){{ $paper->user['fname']." ".$paper->user['lname'] }}@endif</span></td>
                    <td class="text-center">{{ config('global.present')[$paper->present] }}</td>
                    <td class="text-center">{{ $paper->topics->name }}</td>
                    <td class="text-center"><input type="hidden" name="unchk[]" value="{{ $paper->id }}">{{ $paper->reviewer_full()->count() }}</td>
                    <td><input type="checkbox" name="chk[]" value="{{ $paper->id }}"
                      @if($paper->reviewer_full()->where('rev_id', $reviewer->id)->exists() and ($paper->reviewer_full()->where('rev_id', $reviewer->id)->first()->pivot->result != NULL )) checked onclick="return false;"
                      @elseif($paper->reviewer_full()->where('rev_id', $reviewer->id)->exists()) checked
                      @elseif($paper->reviewer_full()->count() == 3) disabled
                      @endif>
                      <small>
                      @if($paper->reviewer_full()->where('rev_id', $reviewer->id)->exists() and $paper->reviewer_full()->where('rev_id', $reviewer->id)->first()->pivot->result != NULL) ประเมินแล้ว
                      @elseif($paper->reviewer_full()->where('rev_id', $reviewer->id)->exists()) ยังไม่ประเมิน
                      @endif
                      </small>
                    </td>
                </tr>
                @endif
            @endforeach

        </table>
        <input type="hidden" name="reviewer_id" value="{{ $reviewer->id }}">
        <button type="submit" name="Submit" class="btn btn-primary">บันทึก</button>
        <button type="button" class="btn btn-warning" onclick="history.back()">ย้อนกลับ</button>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->


</section>
@endsection
