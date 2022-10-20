@extends('frontend.layouts.default_layout')
@section('title') Home @parent @endsection

@section('content')
<div class="container mt-5 pt-4">
    <div class="card">
        <div class="card-header bg-pt-purple text-light">รูปแบบการนำเสนอผลงาน </div>
        <div class="card-body">
            <h5 class="text-primary"><b>1) Oral Presentation</b></h5>
            <p>นำเสนอผลงาน 10 นาที ซักถาม 5 นาที</p>
            <hr>
            <h5 class="text-primary"><b>2) Poster Presentation</b></h5>
            <p>กำหนดให้โปสเตอร์มีขนาด กว้าง 90 เซนติเมตร ยาว 120 เซนติเมตร (แนวตั้ง) จำนวน 1 แผ่น ต่อ 1 เรื่อง</p>
            <h6 class="text-primary">รายละเอียดของโปสเตอร์ เป็นภาษาไทยหรือภาษาอังกฤษ ประกอบด้วย</h6>
            <ol>
                <li>ชื่อเรื่อง มีทั้งภาษาไทยและภาษาอังกฤษ</li>
                <li>ชื่อผู้ทำวิจัยและหน่วยงานที่สังกัด</li>
                <li>บทคัดย่อ</li>
                <li>หลักการและเหตุผล/วัตถุประสงค์การวิจัย</li>
                <li>วิธีวิจัย</li>
                <li>ผลการวิจัยและอภิปรายผล</li>
                <li>บทสรุป</li>
                <li>เอกสารอ้างอิง/กิตติกรรมประกาศ (ถ้ามี)</li>
            </ol>
        </div>
    </div>

</div>
@endsection
