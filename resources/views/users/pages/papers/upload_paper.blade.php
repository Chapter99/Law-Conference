@extends('users.layouts.default_layout')
@section('title') อัพโหลดไฟล์ ผลงานฉบับแก้ไข @parent @endsection

@section('content')

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header bg-secondary">
            <h3 class="card-title">อัพโหลดไฟล์ ผลงานฉบับแก้ไข</h3>

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
            <form method="POST" action="{{ route('users.upload_paper_update', $paper->id) }}" role="form" id="containerForm"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label class="col-sm-2 text-right" for="title">ชื่อเรื่อง </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" name="title" value="{{ $paper->title }}" disabled>
                    </div>
                </div>
                <p class="text-danger">อัพโหลดผลงานฉบับแก้ไข ภายในวันที่ 13 พฤษภาคม 2565</p>
                @if($paper->present == 1) 
                <div class="form-group row">
                    <label class="col-sm-2 text-right" for="fullpaper_word">ไฟล์บทความฉบับเต็ม <span class="text-danger">*</span><br>Word </label>
                    <div class="col-sm-6">
                        <input type="file" class="form-control @error("fullpaper_word") is-invalid @enderror" id="fullpaper_word" name="fullpaper_word">
                        @error("fullpaper_word")<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="col-sm-4">
                        <small id="passwordHelpInline" class="text-muted">ไฟล์ .doc หรือ .docx เท่านั้น ขนาดไม่เกิน 30 MB</small>
                    </div>
                </div>
                <div class="form-group row"><label class="col-sm-2 text-right" for="fullpaper_pdf">ไฟล์บทความฉบับเต็ม <span class="text-danger">*</span><br>PDF </label>
                    <div class="col-sm-6"><input type="file" class="form-control @error("fullpaper_pdf") is-invalid @enderror" id="fullpaper_pdf" name="fullpaper_pdf">
                        @error("fullpaper_pdf")<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="col-sm-4">
                        <small id="passwordHelpInline" class="text-muted">ไฟล์ .pdf เท่านั้น ขนาดไม่เกิน 30 MB</small>
                    </div>
                </div>
                @elseif($paper->present == 2) 
                <div class="form-group row">
                    <label class="col-sm-2 text-right" for="abstract_word">ไฟล์บทคัดย่อ <span class="text-danger">*</span><br>Word </label>
                    <div class="col-sm-6">
                        <input type="file" class="form-control @error("abstract_word") is-invalid @enderror" id="abstract_word" name="abstract_word">
                        @error("abstract_word")<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="col-sm-4">
                        <small id="passwordHelpInline" class="text-muted">ไฟล์ .doc หรือ .docx เท่านั้น ขนาดไม่เกิน 30 MB</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 text-right" for="abstract_pdf">ไฟล์บทคัดย่อ <span class="text-danger">*</span><br>PDF </label>
                    <div class="col-sm-6">
                        <input type="file" class="form-control @error("abstract_pdf") is-invalid @enderror" id="abstract_pdf" name="abstract_pdf">
                        @error("abstract_pdf")<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="col-sm-4">
                        <small id="passwordHelpInline" class="text-muted">ไฟล์ .pdf เท่านั้น ขนาดไม่เกิน 30 MB</small>
                    </div>
                </div>
                @elseif($paper->present == 3) 
                <div class="form-group row">
                    <label class="col-sm-2 text-right" for="poster">ไฟล์ Poster/Infographic <span class="text-danger">*</span> </label>
                    <div class="col-sm-6">
                        <input type="file" class="form-control @error("poster") is-invalid @enderror" id="poster" name="poster">
                        @error("poster")<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="col-sm-4">
                        <small id="passwordHelpInline" class="text-muted">ไฟล์ .jpg, .png หรือ .pdf เท่านั้น ขนาดไม่เกิน 30 MB</small>
                    </div>
                </div>
                @endif
                <div class="form-group row">
                    <label class="col-sm-2"></label>
                    <div class="col-sm-3">
                        <input type="hidden" name="present" value="{{ $paper->present }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <button type="submit" name="Submit" class="btn btn-primary">บันทึก</button>
                        <a class="btn btn-warning" href="{{ route('users.home') }}">ยกเลิก</a>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</section>

@endsection
