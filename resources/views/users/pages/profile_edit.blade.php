@extends('users.layouts.default_layout')
@section('title') ข้อมูลการลงทะเบียน @parent @endsection

@section('content')

<!-- Main content -->
<section class="content">

    <div class="card">
        <div class="card-header bg-secondary">
            <h3 class="card-title">แก้ไขข้อมูลการลงทะเบียน</h3>

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
            <form method="POST" action="{{ route('profile.update', $user->id) }}">
                @csrf
                @method('PUT')
                <div class="row-fluid">
                    <p class="text-center text-primary">กรุณากรอกข้อมูลที่มีเครื่องหมาย <span class="text-danger">*</span> ให้ครบทุกช่อง </p>
                    <div class="form-group row">
                        <label class="col-sm-2 text-right" for="title">คำนำหน้านาม <span class="text-danger">*</span></label>
                        <div class="col-sm-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="title" id="title1" value="นาย" required @if($user->title == 'นาย') checked @endif>
                                <label class="form-check-label" for="title1">นาย</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="title" id="title2" value="นาง" @if($user->title == 'นาง') checked @endif>
                                <label class="form-check-label" for="title2">นาง</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="title" id="title3" value="นางสาว" @if($user->title == 'นางสาว') checked @endif>
                                <label class="form-check-label" for="title3">นางสาว</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="title" id="title4" value="อื่นๆ" @if($user->title == 'อื่นๆ') checked @endif>
                                <label class="form-check-label" for="title4">อื่นๆ</label>
                            </div>
                        </div>
                        <label class="col-sm-3 text-right" for="academic">ตำแหน่งทางวิชาการ</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="academic">
                                <option value="">ไม่มี</option>
                                <option value="อ." @if($user->academic == 'อ.') selected @endif>อาจารย์</option>
                                <option value="ดร." @if($user->academic == 'ดร.') selected @endif>ดร.</option>
                                <option value="ผศ." @if($user->academic == 'ผศ.') selected @endif>ผู้ช่วยศาสตราจารย์</option>
                                <option value="ผศ.ดร." @if($user->academic == 'ผศ.ดร.') selected @endif>ผู้ช่วยศาสตราจารย์ ดร.</option>
                                <option value="รศ." @if($user->academic == 'รศ.') selected @endif>รองศาสตราจารย์</option>
                                <option value="รศ.ดร." @if($user->academic == 'รศ.ดร.') selected @endif>รองศาสตราจารย์ ดร.</option>
                                <option value="ศ." @if($user->academic == 'ศ.') selected @endif>ศาสตราจารย์</option>
                                <option value="ศ.ดร." @if($user->academic == 'ศ.ดร.') selected @endif>ศาสตราจารย์ ดร.</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 text-right" for="fname">ชื่อ-สกุล <span class="text-danger">*</span></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control @error('fname') is-invalid @enderror" id="fname" name="fname" value="{{ $user->fname }}" required placeholder="ชื่อ" >
                            @error('fname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-5">
                            <input type="text" class="form-control  @error('fname') is-invalid @enderror" name="lname" value="{{ $user->lname }}" required placeholder="นามสกุล">
                            @error('lname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 text-right" for="address">ที่อยู่ <span class="text-danger">*</span><br>ออกใบเสร็จ</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ $user->address }}" required placeholder="ที่อยู่" >
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 text-right" for="province">จังหวัด <span class="text-danger">*</span></label>
                        <div class="col-sm-4">
                            <select class="form-control @error('province') is-invalid @enderror" name="province"  required>
                                <option value="">--- โปรดระบุ ---</option>
                                <option value="กรุงเทพมหานคร" @if($user->province == 'กรุงเทพมหานคร') selected @endif>กรุงเทพมหานคร</option>
                                <option value="กระบี่" @if($user->province == 'กระบี่') selected @endif>กระบี่ </option>
                                <option value="กาญจนบุรี" @if($user->province == 'กาญจนบุรี') selected @endif>กาญจนบุรี </option>
                                <option value="กาฬสินธุ์" @if($user->province == 'กาฬสินธุ์') selected @endif>กาฬสินธุ์ </option>
                                <option value="กำแพงเพชร" @if($user->province == 'กำแพงเพชร') selected @endif>กำแพงเพชร </option>
                                <option value="ขอนแก่น" @if($user->province == 'ขอนแก่น') selected @endif>ขอนแก่น</option>
                                <option value="จันทบุรี" @if($user->province == 'จันทบุรี') selected @endif>จันทบุรี</option>
                                <option value="ฉะเชิงเทรา" @if($user->province == 'ฉะเชิงเทรา') selected @endif>ฉะเชิงเทรา </option>
                                <option value="ชัยนาท" @if($user->province == 'ชัยนาท') selected @endif>ชัยนาท </option>
                                <option value="ชัยภูมิ" @if($user->province == 'ชัยภูมิ') selected @endif>ชัยภูมิ </option>
                                <option value="ชุมพร" @if($user->province == 'ชุมพร') selected @endif>ชุมพร </option>
                                <option value="ชลบุรี" @if($user->province == 'ชลบุรี') selected @endif>ชลบุรี </option>
                                <option value="เชียงใหม่" @if($user->province == 'เชียงใหม่') selected @endif>เชียงใหม่ </option>
                                <option value="เชียงราย" @if($user->province == 'เชียงราย') selected @endif>เชียงราย </option>
                                <option value="ตรัง" @if($user->province == 'ตรัง') selected @endif>ตรัง </option>
                                <option value="ตราด" @if($user->province == 'ตราด') selected @endif>ตราด </option>
                                <option value="ตาก" @if($user->province == 'ตาก') selected @endif>ตาก </option>
                                <option value="นครนายก" @if($user->province == 'นครนายก') selected @endif>นครนายก </option>
                                <option value="นครปฐม" @if($user->province == 'นครปฐม') selected @endif>นครปฐม </option>
                                <option value="นครพนม" @if($user->province == 'นครพนม') selected @endif>นครพนม </option>
                                <option value="นครราชสีมา" @if($user->province == 'นครราชสีมา') selected @endif>นครราชสีมา </option>
                                <option value="นครศรีธรรมราช" @if($user->province == 'นครศรีธรรมราช') selected @endif>นครศรีธรรมราช </option>
                                <option value="นครสวรรค์" @if($user->province == 'นครสวรรค์') selected @endif>นครสวรรค์ </option>
                                <option value="นราธิวาส" @if($user->province == 'นราธิวาส') selected @endif>นราธิวาส </option>
                                <option value="น่าน" @if($user->province == 'น่าน') selected @endif>น่าน </option>
                                <option value="นนทบุรี" @if($user->province == 'นนทบุรี') selected @endif>นนทบุรี </option>
                                <option value="บึงกาฬ" @if($user->province == 'บึงกาฬ') selected @endif>บึงกาฬ</option>
                                <option value="บุรีรัมย์" @if($user->province == 'บุรีรัมย์') selected @endif>บุรีรัมย์</option>
                                <option value="ประจวบคีรีขันธ์" @if($user->province == 'ประจวบคีรีขันธ์') selected @endif>ประจวบคีรีขันธ์ </option>
                                <option value="ปทุมธานี" @if($user->province == 'ปทุมธานี') selected @endif>ปทุมธานี </option>
                                <option value="ปราจีนบุรี" @if($user->province == 'ปราจีนบุรี') selected @endif>ปราจีนบุรี </option>
                                <option value="ปัตตานี" @if($user->province == 'ปัตตานี') selected @endif>ปัตตานี </option>
                                <option value="พะเยา" @if($user->province == 'พะเยา') selected @endif>พะเยา </option>
                                <option value="พระนครศรีอยุธยา" @if($user->province == 'พระนครศรีอยุธยา') selected @endif>พระนครศรีอยุธยา </option>
                                <option value="พังงา" @if($user->province == 'พังงา') selected @endif>พังงา </option>
                                <option value="พิจิตร" @if($user->province == 'พิจิตร') selected @endif>พิจิตร </option>
                                <option value="พิษณุโลก" @if($user->province == 'พิษณุโลก') selected @endif>พิษณุโลก </option>
                                <option value="เพชรบุรี" @if($user->province == 'เพชรบุรี') selected @endif>เพชรบุรี </option>
                                <option value="เพชรบูรณ์" @if($user->province == 'เพชรบูรณ์') selected @endif>เพชรบูรณ์ </option>
                                <option value="แพร่" @if($user->province == 'แพร่') selected @endif>แพร่ </option>
                                <option value="พัทลุง" @if($user->province == 'พัทลุง') selected @endif>พัทลุง </option>
                                <option value="ภูเก็ต" @if($user->province == 'ภูเก็ต') selected @endif>ภูเก็ต </option>
                                <option value="มหาสารคาม" @if($user->province == 'มหาสารคาม') selected @endif>มหาสารคาม </option>
                                <option value="มุกดาหาร" @if($user->province == 'มุกดาหาร') selected @endif>มุกดาหาร </option>
                                <option value="แม่ฮ่องสอน" @if($user->province == 'แม่ฮ่องสอน') selected @endif>แม่ฮ่องสอน </option>
                                <option value="ยโสธร" @if($user->province == 'ยโสธร') selected @endif>ยโสธร </option>
                                <option value="ยะลา" @if($user->province == 'ยะลา') selected @endif>ยะลา </option>
                                <option value="ร้อยเอ็ด" @if($user->province == 'ร้อยเอ็ด') selected @endif>ร้อยเอ็ด </option>
                                <option value="ระนอง" @if($user->province == 'ระนอง') selected @endif>ระนอง </option>
                                <option value="ระยอง" @if($user->province == 'ระยอง') selected @endif>ระยอง </option>
                                <option value="ราชบุรี" @if($user->province == 'ราชบุรี') selected @endif>ราชบุรี</option>
                                <option value="ลพบุรี" @if($user->province == 'ลพบุรี') selected @endif>ลพบุรี </option>
                                <option value="ลำปาง" @if($user->province == 'ลำปาง') selected @endif>ลำปาง </option>
                                <option value="ลำพูน" @if($user->province == 'ลำพูน') selected @endif>ลำพูน </option>
                                <option value="เลย" @if($user->province == 'เลย') selected @endif>เลย </option>
                                <option value="ศรีสะเกษ" @if($user->province == 'ศรีสะเกษ') selected @endif>ศรีสะเกษ</option>
                                <option value="สกลนคร" @if($user->province == 'สกลนคร') selected @endif>สกลนคร</option>
                                <option value="สงขลา" @if($user->province == 'สงขลา') selected @endif>สงขลา </option>
                                <option value="สมุทรสาคร" @if($user->province == 'สมุทรสาคร') selected @endif>สมุทรสาคร </option>
                                <option value="สมุทรปราการ" @if($user->province == 'สมุทรปราการ') selected @endif>สมุทรปราการ </option>
                                <option value="สมุทรสงคราม" @if($user->province == 'สมุทรสงคราม') selected @endif>สมุทรสงคราม </option>
                                <option value="สระแก้ว" @if($user->province == 'สระแก้ว') selected @endif>สระแก้ว </option>
                                <option value="สระบุรี" @if($user->province == 'สระบุรี') selected @endif>สระบุรี </option>
                                <option value="สิงห์บุรี" @if($user->province == 'สิงห์บุรี') selected @endif>สิงห์บุรี </option>
                                <option value="สุโขทัย" @if($user->province == 'สุโขทัย') selected @endif>สุโขทัย </option>
                                <option value="สุพรรณบุรี" @if($user->province == 'สุพรรณบุรี') selected @endif>สุพรรณบุรี </option>
                                <option value="สุราษฎร์ธานี" @if($user->province == 'สุราษฎร์ธานี') selected @endif>สุราษฎร์ธานี </option>
                                <option value="สุรินทร์" @if($user->province == 'สุรินทร์') selected @endif>สุรินทร์ </option>
                                <option value="สตูล" @if($user->province == 'สตูล') selected @endif>สตูล </option>
                                <option value="หนองคาย" @if($user->province == 'หนองคาย') selected @endif>หนองคาย </option>
                                <option value="หนองบัวลำภู" @if($user->province == 'หนองบัวลำภู') selected @endif>หนองบัวลำภู </option>
                                <option value="อำนาจเจริญ" @if($user->province == 'อำนาจเจริญ') selected @endif>อำนาจเจริญ </option>
                                <option value="อุดรธานี" @if($user->province == 'อุดรธานี') selected @endif>อุดรธานี </option>
                                <option value="อุตรดิตถ์" @if($user->province == 'อุตรดิตถ์') selected @endif>อุตรดิตถ์ </option>
                                <option value="อุทัยธานี" @if($user->province == 'อุทัยธานี') selected @endif>อุทัยธานี </option>
                                <option value="อุบลราชธานี" @if($user->province == 'อุบลราชธานี') selected @endif>อุบลราชธานี</option>
                                <option value="อ่างทอง" @if($user->province == 'อ่างทอง') selected @endif>อ่างทอง </option>
                            </select>
                            @error('province')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <label class="col-sm-2 text-right" for="postcode">รหัสไปรษณีย์</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control @error('postcode') is-invalid @enderror" id="postcode" name="postcode" value="{{ $user->postcode }}" required placeholder="รหัสไปรษณีย์" >
                            @error('postcode')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 text-right" for="tel">โทรศัพท์มือถือ <span class="text-danger">*</span></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control @error('tel') is-invalid @enderror" id="tel" name="tel" value="{{ $user->tel }}" placeholder="หมายเลขโทรศัพท์" required >
                            @error('tel')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label class="col-sm-2 text-right" for="register_type">รูปแบบผู้เข้าร่วม <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input @error('register_type') is-invalid @enderror" type="radio" name="register_type" id="register_type1" value="1" onclick="type_change(this.value);" @if($user->register_type == 1) checked @endif required >
                                <label class="form-check-label" for="register_type1">นิสิตและบุคลากร คณะนิติศาสตร์ มหาวิทยาลัยทักษิณ </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input @error('register_type') is-invalid @enderror" type="radio" name="register_type" id="register_type2" value="2" onclick="type_change(this.value);" @if($user->register_type == 2) checked @endif>
                                <label class="form-check-label" for="register_type2">นิสิตและบุคลากร มหาวิทยาลัยทักษิณ  </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input @error('register_type') is-invalid @enderror" type="radio" name="register_type" id="register_type3" value="3" onclick="type_change(this.value);" @if($user->register_type == 3) checked @endif>
                                <label class="form-check-label" for="register_type3">หน่วยงานภาคีเครือข่าย </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input @error('register_type') is-invalid @enderror" type="radio" name="register_type" id="register_type4" value="4" onclick="type_change(this.value);" @if($user->register_type == 4) checked @endif>
                                <label class="form-check-label" for="register_type4">บุคคลทั่วไป </label>
                            </div>
                            @error('register_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div id="id_partner"></div>
                    <div id="id_org"></div>
                    {{-- <div class="form-group row">
                        <label class="col-sm-2 text-right" for="partner">หน่วยงานภาคีเครือข่าย <span class="text-danger">*</span></label>
                        <div class="col-sm-6">
                            <select class="form-control @error('partner') is-invalid @enderror" name="partner">
                                <option value="">--- โปรดระบุ ---</option>
                                <option value="1" @if(old('partner')==1) selected @endif>คณะนิติศาสตร์ มหาวิทยาลัยสงขลานครินทร์ </option>
                                <option value="2" @if(old('partner')==2) selected @endif>คณะนิติศาสตร์ มหาวิทยาลัยราชภัฏสุราษฎร์ธานี </option>
                                <option value="3" @if(old('partner')==3) selected @endif>คณะมนุษยศาสตร์และสังคมศาสตร์ มหาวิทยาลัยราชภัฏนครศรีธรรมราช</option>
                                <option value="4" @if(old('partner')==4) selected @endif>คณะมนุษยศาสตร์และสังคมศาสตร์ มหาวิทยาลัยราชภัฏภูเก็ต </option>
                                <option value="5" @if(old('partner')==5) selected @endif>คณะมนุษยศาสตร์และสังคมศาสตร์  มหาวิทยาลัยราชภัฏยะลา</option>
                                <option value="6" @if(old('partner')==6) selected @endif>สำนักวิชารัฐศาสตร์และนิติศาสตร์ มหาวิทยาลัยวลัยลักษณ์ </option>
                                <option value="7" @if(old('partner')==7) selected @endif>คณะอิสลามศึกษาและนิติศาสตร์ มหาวิทยาลัยฟาฏอนี</option>
                            </select>
                            @error('partner')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 text-right" for="org">สังกัด <span class="text-danger">*</span></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control @error('org') is-invalid @enderror" id="org" name="org" value="{{ old('org') }}" >
                            @error('org')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div> --}}
                    <div class="form-group row">
                        <label class="col-sm-2 text-right" for="present">การนำเสนอผลงาน <span class="text-danger">*</span></label>
                        <div class="col-sm-4">
                            <div class="form-check">
                                <input class="form-check-input @error('present') is-invalid @enderror" type="radio" name="present" id="present1" value="N" @if($user->present == 'N') checked @endif required >
                                <label class="form-check-label" for="present1">ไม่นำเสนอผลงาน</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input @error('present') is-invalid @enderror" type="radio" name="present" id="present2" value="Y" @if($user->present == 'Y') checked @endif>
                                <label class="form-check-label" for="present2">นำเสนอผลงาน</label>
                            </div>
                            @error('present')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-2">
                            <button type="submit" class="btn btn-primary" onclick="showLoading();">ปรับปรุงข้อมูล</button>
                            <a href="{{ url('users/profile') }}" class="btn btn-warning">ยกเลิก</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
<script>
    function type_change(type){
        var id_org = document.getElementById("id_org");
        var id_partner = document.getElementById("id_partner");
        if(type == 3){
            id_partner.innerHTML = '<div class="form-group row"><label class="col-sm-2 text-right" for="partner">หน่วยงานภาคีเครือข่าย <span class="text-danger">*</span></label><div class="col-sm-6"><select class="form-control @error("partner") is-invalid @enderror" name="partner"><option value="">--- โปรดระบุ ---</option><option value="1" @if(old("partner")==1) selected @endif>คณะนิติศาสตร์ มหาวิทยาลัยสงขลานครินทร์ </option><option value="2" @if(old("partner")==2) selected @endif>คณะนิติศาสตร์ มหาวิทยาลัยราชภัฏสุราษฎร์ธานี </option><option value="3" @if(old("partner")==3) selected @endif>คณะมนุษยศาสตร์และสังคมศาสตร์ มหาวิทยาลัยราชภัฏนครศรีธรรมราช</option><option value="4" @if(old("partner")==4) selected @endif>คณะมนุษยศาสตร์และสังคมศาสตร์ มหาวิทยาลัยราชภัฏภูเก็ต </option><option value="5" @if(old("partner")==5) selected @endif>คณะมนุษยศาสตร์และสังคมศาสตร์  มหาวิทยาลัยราชภัฏยะลา</option><option value="6" @if(old("partner")==6) selected @endif>สำนักวิชารัฐศาสตร์และนิติศาสตร์ มหาวิทยาลัยวลัยลักษณ์ </option><option value="7" @if(old("partner")==7) selected @endif>คณะอิสลามศึกษาและนิติศาสตร์ มหาวิทยาลัยฟาฏอนี</option></select>@error("partner")<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div></div>';
            id_org.innerHTML = '';
        }else if(type == 4) {
            id_partner.innerHTML = '';
            id_org.innerHTML = '<div class="form-group row"><label class="col-sm-2 text-right" for="org">สังกัด <span class="text-danger">*</span></label><div class="col-sm-4"><input type="text" class="form-control @error("org") is-invalid @enderror" id="org" name="org" value="{{ old("org") }}" >@error("org")<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div></div>';
        }else{
            id_partner.innerHTML = '';
            id_org.innerHTML = '';
        }

    }
    @if($user->register_type == 3)
    var id_partner = document.getElementById("id_partner");
    id_partner.innerHTML = '<div class="form-group row"><label class="col-sm-2 text-right" for="partner">หน่วยงานภาคีเครือข่าย <span class="text-danger">*</span></label><div class="col-sm-6"><select class="form-control @error("partner") is-invalid @enderror" name="partner"><option value="">--- โปรดระบุ ---</option><option value="1" @if($user->partner==1) selected @endif>คณะนิติศาสตร์ มหาวิทยาลัยสงขลานครินทร์ </option><option value="2" @if($user->partner==2) selected @endif>คณะนิติศาสตร์ มหาวิทยาลัยราชภัฏสุราษฎร์ธานี </option><option value="3" @if($user->partner==3) selected @endif>คณะมนุษยศาสตร์และสังคมศาสตร์ มหาวิทยาลัยราชภัฏนครศรีธรรมราช</option><option value="4" @if($user->partner==4) selected @endif>คณะมนุษยศาสตร์และสังคมศาสตร์ มหาวิทยาลัยราชภัฏภูเก็ต </option><option value="5" @if($user->partner==5) selected @endif>คณะมนุษยศาสตร์และสังคมศาสตร์  มหาวิทยาลัยราชภัฏยะลา</option><option value="6" @if($user->partner==6) selected @endif>สำนักวิชารัฐศาสตร์และนิติศาสตร์ มหาวิทยาลัยวลัยลักษณ์ </option><option value="7" @if($user->partner==7) selected @endif>คณะอิสลามศึกษาและนิติศาสตร์ มหาวิทยาลัยฟาฏอนี</option></select>@error("partner")<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div></div>';
    @endif
   
    @if($user->register_type == 4)
    var id_org = document.getElementById("id_org");
    id_org.innerHTML = '<div class="form-group row"><label class="col-sm-2 text-right" for="org">สังกัด <span class="text-danger">*</span></label><div class="col-sm-4"><input type="text" class="form-control @error("org") is-invalid @enderror" id="org" name="org" value="{{ $user->org }}" >@error("org")<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div></div>';
    @endif
</script>
@endsection
