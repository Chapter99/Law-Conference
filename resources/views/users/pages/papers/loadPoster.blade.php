
            <div class="form-group row">
                <label class="col-sm-2 text-right" for="poster">ไฟล์ Poster/Infographic <span class="text-danger">*</span> </label>
                <div class="col-sm-6">
                    <input type="file" class="form-control @error('poster') is-invalid @enderror" id="poster" name="poster">
                    @error('poster')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <small id="passwordHelpInline" class="text-muted">ไฟล์ .jpg, .png หรือ .pdf เท่านั้น ขนาดไม่เกิน 30 MB</small>
                </div>
            </div>
