@extends('backend.layouts.default_layout')
@section('title') ผู้ทรงคุณวุฒิ @parent @endsection

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
      <h3 class="card-title">ผู้ทรงคุณวุฒิ</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
        <div class="row">
          <div class="col-5">
            <form action="{{ url('backend/reviewers') }}" method="GET" id="myForm">
              <select name="topic" id="topic" class="form-control" onchange="document.getElementById('myForm').submit();">
                <option value="">--- ทั้งหมด ---</option>
                @foreach ($topics as $topic)
                    <option value="{{ $topic->id }}" @if($topic->id == request()->topic) selected @endif>{{ $topic->id.") ".$topic->name }}</option>
                @endforeach
              </select>
            </form>
          </div>
          <div class="col-7 text-right">
              <a href="{{ route('reviewers.create') }}" class="btn btn-warning">เพิ่มผู้ทรงคุณวุฒิ</a>
          </div>
        </div>
        <table class="table table-hover mt-3">
            <tr class="bg-light">
                <th>ลำดับ</th>
                <th>ชื่อ-สกุล</th>
                <th class="text-center">Session</th>
                <th class="text-center">ลบ/แก้ไข</th>
                <th class="text-center">ประเมินฉบับเต็ม</th>
                <th class="text-center">ประเมินบทคัดย่อ</th>
                <th class="text-center">ประเมินโปสเตอร์</th>
                <th class="text-center">ส่งอีเมลเชิญ</th>
            </tr>
            @foreach ($reviewers as $reviewer)
                <tr>
                    <td class="text-center">{{ $loop->index + 1 }}</td>
                    <td>{{ $reviewer->title.$reviewer->fname." ".$reviewer->lname }}<br><small class="text-primary">{{ $reviewer->university }}</small></td>
                    <td class="text-center">{{ $reviewer->ss1}} @if($reviewer->ss2), {{$reviewer->ss2}}@endif @if($reviewer->ss3), {{$reviewer->ss3}}@endif @if($reviewer->ss4), {{$reviewer->ss4}}@endif </td>
                    <td class="text-center">
                        <form action="{{route('reviewers.destroy', $reviewer->id) }}" method="POST">
                            @csrf
                            <a class="btn btn-outline-info btn-sm" href="{{ route('reviewers.edit', $reviewer->id) }}"><i class="fas fa-pencil-alt"></i> แก้ไข</a>
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('ต้องการลบรายการนี้หรือไม่')"><i class="fas fa-trash"></i>ลบ</button>
                        </form>
                    </td>
                    <td class="text-center"><a class="btn btn-outline-secondary btn-sm" href="{{ route('reviewers.review_full', $reviewer->id) }}"><i class="fas fa-address-card"></i> เลือก</a></td>
                    <td class="text-center"><a class="btn btn-outline-secondary btn-sm" href="{{ route('reviewers.review_abstract', $reviewer->id) }}"><i class="fas fa-address-card"></i> เลือก</a></td>
                    <td class="text-center"><a class="btn btn-outline-secondary btn-sm" href="{{ route('reviewers.review_poster', $reviewer->id) }}"><i class="fas fa-address-card"></i> เลือก</a></td>
                    <td class="text-center">
                      @if($reviewer->invite == 1)
                      <span class="text-secondary"><i class="fas fa-envelope"></i> อีเมลแล้ว</span>
                      @else
                      <a class="btn btn-outline-primary btn-sm" href="{{ route('reviewers.email_reviewer', $reviewer->id) }}" onclick="showLoading(); return true;"><i class="fas fa-envelope"></i> ส่งอีเมล</a>
                      @endif
                    </td>
                </tr>
            @endforeach

        </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
  <section id="loading">
    <div id="loading-content"></div>
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
</section>
@endsection
