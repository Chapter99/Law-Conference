
<div class="form-group row">
    <label class="col-sm-2 text-right" for="abstract_word">ไฟล์บทคัดย่อ <span class="text-danger">*</span><br>Word </label>
    <div class="col-sm-6">
        <input type="file" class="form-control @error('abstract_word') is-invalid @enderror" id="abstract_word" name="abstract_word">
        @error('abstract_word')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-sm-4">
        <small id="passwordHelpInline" class="text-muted">ไฟล์ .doc หรือ .docx เท่านั้น ขนาดไม่เกิน 30 MB</small>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 text-right" for="abstract_pdf">ไฟล์บทคัดย่อ <span class="text-danger">*</span><br>PDF </label>
    <div class="col-sm-6">
        <input type="file" class="form-control @error('abstract_pdf') is-invalid @enderror" id="abstract_pdf" name="abstract_pdf">
        @error('abstract_pdf')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-sm-4">
        <small id="passwordHelpInline" class="text-muted">ไฟล์ .pdf เท่านั้น ขนาดไม่เกิน 30 MB</small>
    </div>
</div>