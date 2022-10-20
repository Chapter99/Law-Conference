@extends('users.layouts.default_layout')
@section('title') ส่งผลงาน @parent @endsection

@section('content')

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header bg-secondary">
      <h3 class="card-title">ส่งผลงาน</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
    <form method="POST" action="{{ route('papers.store') }}" role="form" id="containerForm" enctype="multipart/form-data">
        @csrf
            <div class="form-group row">
                <label class="col-sm-2 text-right" for="title">ชื่อเรื่อง <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" placeholder="ชื่อเรื่อง" >
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 text-right" for="authors">ผู้วิจัย/คณะ <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('authors') is-invalid @enderror" id="authors" name="authors" value="{{ old('authors') }}" placeholder="ผู้วิจัย/คณะ" >
                    @error('authors')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 text-right" for="present">รูปแบบ <span class="text-danger">*</span><br>การนำเสนอ </label>
                <div class="col-sm-4">
                    <div class="form-check">
                        <input class="form-check-input @error('present') is-invalid @enderror" type="radio" name="present" id="present1" value="1" @if(old('present')==1) checked @endif>
                        <label class="form-check-label" for="present1">บทความฉบับเต็ม</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input @error('present') is-invalid @enderror" type="radio" name="present" id="present2" value="2" @if(old('present')==2) checked @endif>
                        <label class="form-check-label" for="present2">บทคัดย่อ</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input @error('present') is-invalid @enderror" type="radio" name="present" id="present3" value="3" @if(old('present')==3) checked @endif>
                        <label class="form-check-label" for="present3">Poster/Infographic</label>
                    </div>
                    @error('present')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 text-right" for="topic">Section <span class="text-danger">*</span></label>
                <div class="col-sm-5">
                    <select class="form-control @error('topic') is-invalid @enderror" name="topic">
                        <option value="">--- โปรดระบุ ---</option>
                        @foreach ($topics as $topic)
                            <option value="{{ $topic->id }}" @if($topic->id == old('topic')) selected @endif>{{ $topic->id.') '.$topic->name }}</option>
                        @endforeach
                    </select>
                    @error('topic')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div id="loadFullpaper"></div>
            <div id="loadAbstract"></div>
            <div id="loadPoster"></div>

            <div class="form-group row">
                <label class="col-sm-2"></label>
                <div class="col-sm-3">
                <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                    <button type="submit" name="Submit" class="btn btn-primary">ส่งผลงาน</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</section>
@endsection
@section('custom_script')
<script>
    $('input[name=present]').change(function(){
        var value = $('input[name=present]:checked').val();
        switch(value){
            case '1' :
                    $('#loadFullpaper').html('<div class="form-group row"><label class="col-sm-2 text-right" for="fullpaper_word">ไฟล์บทความฉบับเต็ม <span class="text-danger">*</span><br>Word </label><div class="col-sm-6"><input type="file" class="form-control @error("fullpaper_word") is-invalid @enderror" id="fullpaper_word" name="fullpaper_word">@error("fullpaper_word")<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div><div class="col-sm-4"><small id="passwordHelpInline" class="text-muted">ไฟล์ .doc หรือ .docx เท่านั้น ขนาดไม่เกิน 30 MB</small></div></div><div class="form-group row"><label class="col-sm-2 text-right" for="fullpaper_pdf">ไฟล์บทความฉบับเต็ม <span class="text-danger">*</span><br>PDF </label><div class="col-sm-6"><input type="file" class="form-control @error("fullpaper_pdf") is-invalid @enderror" id="fullpaper_pdf" name="fullpaper_pdf">@error("fullpaper_pdf")<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div><div class="col-sm-4"><small id="passwordHelpInline" class="text-muted">ไฟล์ .pdf เท่านั้น ขนาดไม่เกิน 30 MB</small></div></div>');
                    $('#loadAbstract').html("");
                    $('#loadPoster').html("");
                    break;
            case '2' :
                    $('#loadFullpaper').html("");
                    $('#loadAbstract').html('<div class="form-group row"><label class="col-sm-2 text-right" for="abstract_word">ไฟล์บทคัดย่อ <span class="text-danger">*</span><br>Word </label><div class="col-sm-6"><input type="file" class="form-control @error("abstract_word") is-invalid @enderror" id="abstract_word" name="abstract_word">@error("abstract_word")<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div><div class="col-sm-4"><small id="passwordHelpInline" class="text-muted">ไฟล์ .doc หรือ .docx เท่านั้น ขนาดไม่เกิน 30 MB</small></div></div><div class="form-group row"><label class="col-sm-2 text-right" for="abstract_pdf">ไฟล์บทคัดย่อ <span class="text-danger">*</span><br>PDF </label><div class="col-sm-6"><input type="file" class="form-control @error("abstract_pdf") is-invalid @enderror" id="abstract_pdf" name="abstract_pdf">@error("abstract_pdf")<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div><div class="col-sm-4"><small id="passwordHelpInline" class="text-muted">ไฟล์ .pdf เท่านั้น ขนาดไม่เกิน 30 MB</small></div></div>');
                    $('#loadPoster').html("");
                    break;
            case '3' :
                    $('#loadFullpaper').html("");
                    $('#loadAbstract').html("");
                    $('#loadPoster').html('<div class="form-group row"><label class="col-sm-2 text-right" for="poster">ไฟล์ Poster/Infographic <span class="text-danger">*</span> </label><div class="col-sm-6"><input type="file" class="form-control @error("poster") is-invalid @enderror" id="poster" name="poster">@error("poster")<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div><div class="col-sm-4"><small id="passwordHelpInline" class="text-muted">ไฟล์ .jpg, .png หรือ .pdf เท่านั้น ขนาดไม่เกิน 30 MB</small></div></div>');
                    break;
        }
    });
    @if(old('present')==1)
    $('#loadFullpaper').html('<div class="form-group row"><label class="col-sm-2 text-right" for="fullpaper_word">ไฟล์บทความฉบับเต็ม <span class="text-danger">*</span><br>Word </label><div class="col-sm-6"><input type="file" class="form-control @error("fullpaper_word") is-invalid @enderror" id="fullpaper_word" name="fullpaper_word">@error("fullpaper_word")<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div><div class="col-sm-4"><small id="passwordHelpInline" class="text-muted">ไฟล์ .doc หรือ .docx เท่านั้น ขนาดไม่เกิน 30 MB</small></div></div><div class="form-group row"><label class="col-sm-2 text-right" for="fullpaper_pdf">ไฟล์บทความฉบับเต็ม <span class="text-danger">*</span><br>PDF </label><div class="col-sm-6"><input type="file" class="form-control @error("fullpaper_pdf") is-invalid @enderror" id="fullpaper_pdf" name="fullpaper_pdf">@error("fullpaper_pdf")<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div><div class="col-sm-4"><small id="passwordHelpInline" class="text-muted">ไฟล์ .pdf เท่านั้น ขนาดไม่เกิน 30 MB</small></div></div>');
    @endif

    @if(old('present')==2)
    $('#loadAbstract').html('<div class="form-group row"><label class="col-sm-2 text-right" for="abstract_word">ไฟล์บทคัดย่อ <span class="text-danger">*</span><br>Word </label><div class="col-sm-6"><input type="file" class="form-control @error("abstract_word") is-invalid @enderror" id="abstract_word" name="abstract_word">@error("abstract_word")<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div><div class="col-sm-4"><small id="passwordHelpInline" class="text-muted">ไฟล์ .doc หรือ .docx เท่านั้น ขนาดไม่เกิน 30 MB</small></div></div><div class="form-group row"><label class="col-sm-2 text-right" for="abstract_pdf">ไฟล์บทคัดย่อ <span class="text-danger">*</span><br>PDF </label><div class="col-sm-6"><input type="file" class="form-control @error("abstract_pdf") is-invalid @enderror" id="abstract_pdf" name="abstract_pdf">@error("abstract_pdf")<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div><div class="col-sm-4"><small id="passwordHelpInline" class="text-muted">ไฟล์ .pdf เท่านั้น ขนาดไม่เกิน 30 MB</small></div></div>');
    @endif

    @if(old('present')==3)
    $('#loadPoster').html('<div class="form-group row"><label class="col-sm-2 text-right" for="poster">ไฟล์ Poster/Infographic <span class="text-danger">*</span> </label><div class="col-sm-6"><input type="file" class="form-control @error("poster") is-invalid @enderror" id="poster" name="poster">@error("poster")<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div><div class="col-sm-4"><small id="passwordHelpInline" class="text-muted">ไฟล์ .jpg, .png หรือ .pdf เท่านั้น ขนาดไม่เกิน 30 MB</small></div></div>');
    @endif
</script>
@endsection
