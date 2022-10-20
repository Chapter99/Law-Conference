@extends('frontend.layouts.default_layout')
@section('title') Home @parent @endsection

@section('content')
<div id="carouselId" class="container carousel slide pt-5 mt-3" data-ride="carousel">
    <ol class="carousel-indicators">
        {{-- <li data-target="#carouselId" data-slide-to="0" class="active"></li>
            <li data-target="#carouselId" data-slide-to="1"></li>
            <li data-target="#carouselId" data-slide-to="2"></li> --}}
    </ol>
    <div class="carousel-inner" role="listbox">
        {{-- <div class="carousel-item active">
            <img src="{{asset('assets/images/banner.jpg')}}" class="img-fluid" alt="First slide">
        </div> --}}
    </div>
</div>
<div class="container mt-1 bg-white">
    <div class="row mt-3">
        <div class="col-md-8">
            {{-- <div>
                <img class="img-fluid" src="{{ asset('assets/images/invite_speaker.jpg') }}" alt="">
            </div> --}}
            <div class="card border-primary px-4 pt-3 pb-1">
                <h5 class="text-primary">ข่าวประชาสัมพันธ์ </h5>
                <hr class="mt-0">
                <ul>
                    {{-- <li><a href="{{ asset('downloads/รายงานสืบเนื่องจากการประชุมวิชาการ.pdf') }}" target="_blank">รายงานสืบเนื่องจากการประชุมวิชาการระดับชาติ (Proceedings)</a> <img src="{{ asset('assets/images/update4.gif') }}" alt=""></li>
                    <li><a href="{{ asset('downloads/ห้อง (session) นำเสนอผลงานวิชาการและลิ้งก์ห้อง.pdf') }}" target="_blank">ห้อง (session) นำเสนอผลงานวิชาการและลิ้งก์ห้อง</a></li> --}}
                    <li><a href="{{ asset('downloads/แนวทางปฏิบัติการนำเสนอผลงานทางวิชาการ.pdf') }}" target="_blank">แนวทางปฏิบัติการนำเสนอผลงานทางวิชาการ</a></li>
                    <li><a href="{{ asset('downloads/คู่มือการเข้าสู่ระบบการนำเสนอผลงาน.pdf') }}" target="_blank">คู่มือการเข้าสู่ระบบการนำเสนอผลงาน</a></li>
                </ul>
            </div>
            <div class="card border-primary px-4 pt-3 pb-1">
                <h5 class="text-primary">สาขา</h5>
                <hr class="mt-0">
                <ol>
                    <li>นิติศาสตร์</li>
                    <li>รัฐศาสตร์</li>
                    <li>สังคมศาสตร์</li>
                    <li>บริหารธุรกิจ</li>
                </ol>
            </div>
            <div class="card border-primary px-4 pt-3 pb-1">
                <h5 class="text-primary">ผลงานที่เปิดรับ</h5>
                <hr class="mt-0">
                <ol>
                    <li>บทความวิจัย</li>
                    <li>บทความวิชาการ</li>
                    {{-- <li>Poster/Infographic (เฉพาะนิสิต/นักศึกษา)</li> --}}
                </ol>
            </div>
            {{-- <div class="card border-primary px-4 pt-3 pb-1">
                <h5 class="text-primary">กลุ่มผลงานในการนำเสนอ</h5>
                <hr class="mt-0">
                <ol>
                    <li>ด้านนิติศาสตร์ </li>
                    <li>ด้านสังคมศาสตร์</li>
                </ol>
            </div> --}}

        </div>
        <div class="col-md-4">
            <div class="card border-primary">
                <div class="card-header bg-pt-purple text-light">เข้าสู่ระบบ</div>
                <div class="card-body text-primary p-2">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row mt-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    ลืมรหัสผ่าน
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            {{-- <div class="card border-primary px-4 pt-3 pb-1">
                <h5 class="text-primary">รูปแบบการนำเสนอ</h5>
                <hr class="mt-0">
                <ol>
                    <li>บทความฉบับเต็ม (Full Paper)</li>
                    <li>บทคัดย่อ(Abstract)</li>
                    <li>Poster/Infographic (เฉพาะนิสิต/นักศึกษา)</li>
                </ol>
            </div> --}}
            <div class="card border-primary px-4 pt-3 pb-1">
                <h5 class="text-primary">รูปแบบการนำเสนอ</h5>
                <hr class="mt-0">
                <ol>
                    <li>การบรรยาย (Oral) ผ่านระบบ Online </li>
                    {{-- <li>รัฐศาสตร์</li>
                    <li>สังคมศาสตร์</li>
                    <li>บริหารธุรกิจ</li> --}}
                </ol>
            </div>
        </div>
    </div>
</div>

{{-- <div class="container">
    <div class="card border-primary px-4 pt-3 mt-3 pb-3">
        <h5 class="text-primary">ข่าวประชาสัมพันธ์</h5>
        <hr class="mt-0">
        <ul>
            <li><a href="{{ asset('downloads/ห้อง (session) นำเสนอผลงานวิชาการและลิ้งก์ห้อง.pdf') }}" target="_blank">ห้อง (session) นำเสนอผลงานวิชาการและลิ้งก์ห้อง</a> <img src="{{ asset('assets/images/update4.gif') }}" alt=""></li>
            <li><a href="{{ asset('downloads/แนวทางปฏิบัติการนำเสนอผลงานทางวิชาการ.pdf') }}" target="_blank">แนวทางปฏิบัติการนำเสนอผลงานทางวิชาการ</a> <img src="{{ asset('assets/images/update4.gif') }}" alt=""></li>
            <li><a href="{{ asset('downloads/คู่มือการเข้าสู่ระบบการนำเสนอผลงาน.pdf') }}" target="_blank">คู่มือการเข้าสู่ระบบการนำเสนอผลงาน</a> <img src="{{ asset('assets/images/update4.gif') }}" alt=""></li>
        </ul>
    </div>
</div> --}}

<div class="container">
    <div class="card border-primary px-4 pt-3 mt-3 pb-3">
        <h5 class="text-primary">ค่าลงทะเบียน</h5>
        <hr class="mt-0">
        <table class="table table-bordered">
            <tr class="bg-light">
                <th class="text-center">ประเภท</th>
                <th class="text-center">บทความฉบับเต็ม</th>
                <th class="text-center">บทคัดย่อ</th>
                <th class="text-center">Poster/Infographic<br><span class="font-weight-normal">(รับเฉพาะผลงานของนิสิตและนักศึกษา)</span></th>
            </tr>
            <tr>
                <td>บุคคลทั่วไป</td>
                <td class="text-center">1,500 บาท</td>
                <td class="text-center">1,500 บาท</td>
                <td rowspan="2" class="text-center">500 บาท</td>
            </tr>
            <tr>
                <td>ภาคีเครือข่าย</td>
                <td class="text-center">1,000 บาท</td>
                <td class="text-center">1,000 บาท</td>
            </tr>
        </table>
        <p>* ผู้เข้าร่วมแต่ไม่นำเสนอบทความ 500 บาท</p>
        <h5 class="text-primary pt-2">การชำระเงิน</h5>
        <table class="table">
            <tr>
                <td style="width: 20%">บัญชีออมทรัพย์</td>
                <td>ธนาคารไทยพาณิชย์ จำกัด สาขาสงขลา</td>
            </tr>
            <tr>
                <td>เลขที่บัญชี</td>
                <td>691-2-36609-3</td>
            </tr>
            <tr>
                <td>ชื่อบัญชี</td>
                <td>มหาวิทยาลัยทักษิณ</td>
            </tr>
        </table>
    </div>
</div>
{{-- <div class="container">
    <div class="card border-primary px-4 pt-3 pb-3">
        <img class="img-fluid" src="{{ asset('assets/images/poster.jpg') }}" alt="">
    </div>
</div> --}}

@endsection