
            <div class="form-group row">
                <label class="col-sm-2 text-right" for="fullpaper_word">ไฟล์บทความฉบับเต็ม <span class="text-danger">*</span><br>Word </label>
                <div class="col-sm-6">
                    <input type="file" class="form-control @error('fullpaper_word') is-invalid @enderror" id="fullpaper_word" name="fullpaper_word">
                    @error('fullpaper_word')
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
                <label class="col-sm-2 text-right" for="fullpaper_pdf">ไฟล์บทความฉบับเต็ม <span class="text-danger">*</span><br>PDF </label>
                <div class="col-sm-6">
                    <input type="file" class="form-control @error('fullpaper_pdf') is-invalid @enderror" id="fullpaper_pdf" name="fullpaper_pdf">
                    @error('fullpaper_pdf')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <small id="passwordHelpInline" class="text-muted">ไฟล์ .pdf เท่านั้น ขนาดไม่เกิน 30 MB</small>
                </div>
            </div>
