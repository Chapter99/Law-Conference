@extends('reviewers.layouts.default_layout')
@section('title') ตอบรับ/ปฏิเสธ ประเมินคุณภาพผลงาน @parent @endsection

@section('content')

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header bg-secondary">
            <h3 class="card-title">รายละเอียดผลงาน</h3>

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
                    <th class="text-pt-blue" style="width: 15%">ชื่อผลงาน</th>
                    <td style="width: 80%">{{ $paper->title }}</td>
                </tr>
                <tr>
                    <th class="text-pt-blue">รูปแบบการนำเสนอ</th>
                    <td>{{ config('global.present')[$paper->present] }}</td>
                </tr>
                <tr>
                    <th class="text-pt-blue">กลุ่มสาขา</th>
                    <td>{{ $paper->topic.') '.$paper->topics->name }}</td>
                </tr>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!-- Default box -->
  <div class="card">
    <div class="card-header bg-secondary">
      <h3 class="card-title">ขอเรียนเชิญท่านเป็นผู้ทรงคุณวุฒิ ประเมินคุณภาพผลงาน</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('reviewerlogin.accept_evaluate_save', $paper->id) }}" role="form" id="containerForm">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label class="col-sm-2 text-right" for="accept">ตอบรับ/ปฏิเสธ  <span class="text-danger">*</span></label>
                <div class="col-sm-8">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="accept" id="accept1" value="1" required>
                        <label class="form-check-label" for="accept1">ตอบรับเป็นผู้ทรงคุณวุฒิประเมินคุณภาพบทความวิจัยเรื่องเต็มนี้</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="accept" id="accept2" value="0" required>
                        <label class="form-check-label" for="accept2">ปฏิเสธการเป็นผู้ทรงคุณวุฒิประเมินคุณภาพทความวิจัยเรื่องเต็มนี้</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-8 offset-sm-2">
                    <button type="submit" name="Submit" class="btn btn-primary" onclick="showLoading();">บันทึก</button>&nbsp;&nbsp;&nbsp;
                    <a class="btn btn-warning" href="{{ url('reviewers/')}}">ยกเลิก</a>
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
