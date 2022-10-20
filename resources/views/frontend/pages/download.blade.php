@extends('frontend.layouts.default_layout')
@section('title') Downloads @parent @endsection

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card border-primary">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="mt-1 text-pt-orange text-center">ดาวน์โหลด</h4>
                        </div>
                    </div>
                    <div class="row mt-3 p-3">
                        <table class="table table-hover">
                            <tr>
                                <td>- รูปแบบ Full Paper บทความวิจัย</td>
                                <td><a href="{{ asset('downloads/รูปแบบ Full Paper บทความวิจัย.doc') }}" target="_blank"><i class="fas fa-file-word"></i> ไฟล์ Word</a></td>
                                <td><a href="{{ asset('downloads/รูปแบบ Full Paper บทความวิจัย.pdf') }}" target="_blank"><i class="fas fa-file-pdf"></i> ไฟล์ PDF</a></td>
                            </tr>
                            <tr>
                                <td>- รูปแบบ Full Paper บทความวิชาการ</td>
                                <td><a href="{{ asset('downloads/รูปแบบ Full Paper บทความวิชาการ.doc') }}" target="_blank"><i class="fas fa-file-word"></i> ไฟล์ Word</a></td>
                                <td><a href="{{ asset('downloads/รูปแบบ Full Paper บทความวิชาการ.pdf') }}" target="_blank"><i class="fas fa-file-pdf"></i> ไฟล์ PDF</a></td>
                            </tr>
                            <tr>
                                <td>- รูปแบบ บทคัดย่อ บทความวิจัย</td>
                                <td><a href="{{ asset('downloads/รูปแบบ บทคัดย่อ บทความวิจัย.doc') }}" target="_blank"><i class="fas fa-file-word"></i> ไฟล์ Word</a></td>
                                <td><a href="{{ asset('downloads/รูปแบบ บทคัดย่อ บทความวิจัย.pdf') }}" target="_blank"><i class="fas fa-file-pdf"></i> ไฟล์ PDF</a></td>
                            </tr>
                            <tr>
                                <td>- รูปแบบ บทคัดย่อ บทความวิชาการ</td>
                                <td><a href="{{ asset('downloads/รูปแบบ บทคัดย่อ บทความวิชาการ.doc') }}" target="_blank"><i class="fas fa-file-word"></i> ไฟล์ Word</a></td>
                                <td><a href="{{ asset('downloads/รูปแบบ บทคัดย่อ บทความวิชาการ.pdf') }}" target="_blank"><i class="fas fa-file-pdf"></i> ไฟล์ PDF</a></td>
                            </tr>
                            <tr>
                                <td>- ต้นแบบ Poster/Infographic</td>
                                <td><a href="{{ asset('downloads/poster-infographic.jpg') }}" target="_blank"><i class="fas fa-file-image"></i> ไฟล์ภาพ</a></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>- ข้อปฏิบัติการนำเสนอผลงานรูปแบบ Poster/Infographic</td>
                                <td><a href="{{ asset('downloads/ข้อปฏิบัติการนำเสนอผลงานรูปแบบ Poster-Info.pdf') }}" target="_blank"><i class="fas fa-file-pdf"></i> ไฟล์ PDF</a></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>- ตัวอย่างการเขียนบทความวิจัยและบทคัดย่องานวิจัย</td>
                                <td><a href="{{ asset('downloads/ตัวอย่างการเขียนบทความวิจัยและบทคัดย่องานวิจัย.pdf') }}" target="_blank"><i class="fas fa-file-pdf"></i> ไฟล์ PDF</a></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>- ตัวอย่างการเขียนบทความวิชาการและบทคัดย่อบทความวิชาการ</td>
                                <td><a href="{{ asset('downloads/ตัวอย่างการเขียนบทความวิชาการและบทคัดย่อบทความวิชาการ.pdf') }}" target="_blank"><i class="fas fa-file-pdf"></i> ไฟล์ PDF</a></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>- รูปแบบการเขียนอ้างอิงบทความวิจัยและบทความวิชาการ</td>
                                <td><a href="{{ asset('downloads/รูปแบบการเขียนอ้างอิงบทความวิจัยและบทความวิชาการ.pdf') }}" target="_blank"><i class="fas fa-file-pdf"></i> ไฟล์ PDF</a></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>- รายละเอียดการส่งบทความและบทคัดย่อ</td>
                                <td><a href="{{ asset('downloads/รายละเอียดการส่งบทความและบทคัดย่อ.pdf') }}" target="_blank"><i class="fas fa-file-pdf"></i> ไฟล์ PDF</a></td>
                                <td></td>
                            </tr>
                        </table>
                    

                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection
