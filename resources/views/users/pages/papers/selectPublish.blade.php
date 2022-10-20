@extends('users.layouts.default_layout')
@section('title') การยืนยันการตีพิมพ์ @parent @endsection

@section('content')

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header bg-secondary">
      <h3 class="card-title">การยืนยันการตีพิมพ์</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
    <form method="POST" action="{{ route('users.selectPublish', $paper->id) }}" role="form" id="containerForm">
        @csrf
        @method('PUT')
            <div class="form-group row">
                <label class="col-sm-2 text-right" for="title">ชื่อบทความ</label>
                <div class="col-sm-10">
                    <p class="text-primary">{{ $paper->title }}</p>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 text-right" for="publish">ช่องทาง <span class="text-danger">*</span><br>การตีพิมพ์ </label>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input @error('publish') is-invalid @enderror" type="radio" name="publish" id="publish1" value="1" @if($paper->publish =="1") checked @endif>
                        <label class="form-check-label" for="publish1">1) ตีพิมพ์เฉพาะบทคัดย่อ ในเล่มเอกสารรวมบทคัดย่อ (Abstract Book)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input @error('publish') is-invalid @enderror" type="radio" name="publish" id="publish2" value="2" @if($paper->publish =="2") checked @endif>
                        <label class="form-check-label" for="publish2">2) ตีพิมพ์บทคัดย่อใน Abstract Book และตีพิมพ์บทความวิจัยเรื่องเต็มในรายงานการประชุมวิชาการ (Proceeding) </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input @error('publish') is-invalid @enderror" type="radio" name="publish" id="publish3" value="3" @if($paper->publish =="3") checked @endif>
                        <label class="form-check-label" for="publish3">3) ตีพิมพ์บทคัดย่อใน Abstract Book และตีพิมพ์บทความฉบับสมบูรณ์ (Full paper) ในวารสาร </label>
                    </div>
                    @error('publish')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div id="loadJournal">
                @if($paper->publish == 3)
                <div class="form-group row">
                    <label class="col-sm-2 text-right" for="journal">วารสาร <span class="text-danger">*</span><br>ที่ต้องการตีพิมพ์ </label>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input @error('journal') is-invalid @enderror" type="radio" name="journal" id="journal1" value="1" @if($paper->journal =="1") checked @endif>
                            <label class="form-check-label" for="journal1">วารสารมหาวิทยาลัยทักษิณ <a href="https://www.tci-thaijo.org/index.php/tsujournal" target="_blank">เว็บไซต์</a></label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input @error('journal') is-invalid @enderror" type="radio" name="journal" id="journal2" value="2" @if($paper->journal =="2") checked @endif>
                            <label class="form-check-label" for="journal2">วารสารปาริชาต <a href="https://www.tci-thaijo.org/index.php/parichartjournal" target="_blank">เว็บไซต์</a></label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input @error('journal') is-invalid @enderror" type="radio" name="journal" id="journal3" value="3" @if($paper->journal =="3") checked @endif>
                            <label class="form-check-label" for="journal3">วารสารศึกษาศาสตร์ <a href="https://www.tci-thaijo.org/index.php/eduthu" target="_blank">เว็บไซต์</a></label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input @error('journal') is-invalid @enderror" type="radio" name="journal" id="journal4" value="4" @if($paper->journal =="4") checked @endif>
                            <label class="form-check-label" for="journal4">วารสารวิทยาศาสตร์สุขภาพ มหาวิทยาลัยทักษิณ <a href="https://www.tci-thaijo.org/index.php/JHSTSU" target="_blank">เว็บไซต์</a></label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input @error('journal') is-invalid @enderror" type="radio" name="journal" id="journal5" value="5" @if($paper->journal =="5") checked @endif>
                            <label class="form-check-label" for="journal5">วารสารสำนักหอสมุด มหาวิทยาลัยทักษิณ <a href="http://libapp.tsu.ac.th/OJS/index.php/Journals_library/index" target="_blank">เว็บไซต์</a></label>
                        </div>
                        @error('journal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                @endif
            </div>
            <div class="form-group row">
                <label class="col-sm-2"></label>
                <div class="col-sm-3">
                    <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                    <button type="submit" name="Submit" class="btn btn-primary" onclick="showLoading();">บันทึก</button>
                    <a class="btn btn-warning" href="{{ route('users.home') }}">ยกเลิก</a>
                </div>
            </div>
        </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
    <!-- Default box -->
    <div class="card">
        <div class="card-body">
            <img src="{{ asset('assets/images/publish_journal.jpg') }}" class="img-fluid">
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
</section>

@endsection
@section('custom_script')
<script>
    $('input[name=publish]').change(function(){
        var value = $('input[name=publish]:checked').val();
        switch(value){
            case '1' :
                    $('#loadJournal').html("");
                    break;
            case '2' :
                    $('#loadJournal').html("");
                    break;
            case '3' :
                    $('#loadJournal').load('{{ url("users/loadJournal") }}');
                    break;
        }
    });
</script>
@endsection
