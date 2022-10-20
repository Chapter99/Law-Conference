@extends('frontend.layouts.default_layout')
@section('title') Home @parent @endsection

@section('content')
<div class="container mt-5 pt-4">
    <div class="card">
        <div class="card-header bg-pt-purple text-light">คำถามที่พบบ่อย </div>
        <div class="card-body">
            <p>Q : การส่งผลงานวิจัย สามารถส่งได้กี่รูปแบบ<br><span class="text-success">A : 1. ส่งเฉพาะบทคัดย่อ<br>&nbsp;&nbsp;&nbsp;&nbsp; 2. ส่งบทความวิจัยฉบับเต็ม เลือกตีพิมพ์ใน Proceeding หรือ เลือกตีพิมพ์ในวารสาร 6 ฉบับตามที่งานประชุมกำหนด</span></p>
            <p>Q : ถ้าส่งบทความโดยประสงค์จะตีพิมพ์ในวารสาร ใช้แบบฟอร์มใด<br><span class="text-success">A : ให้ใช้แบบฟอร์มของงานประชุมวิชาการฯ เมื่อผ่านการพิจารณาเสนอตีพิมพ์ในวารสาร ให้ผู้ได้รับการพิจารณาปรับตามแบบฟอร์มของวารสารนั้น ๆ</span></p>
            <p>Q : การนำเสนอ ถ้าเขียนลงวารสารเป็นภาษาอังกฤษ นำเสนอเป็นภาษาอะไร<br><span class="text-success">A : นำเสนอเป็นภาษาไทย</span></p>
            <p>Q : การนำเสนอสามารถขึ้นเวทีนำเสนอได้กี่คน<br><span class="text-success">A : นำเสนอได้ 1 คน</span></p>
            <p>Q : อัตราค่านำเสนอ 1,500 / 1,800 บาท สามารถส่งผลงานได้กี่ชิ้นงาน<br><span class="text-success">A : การนำส่งผลงานต้องชำระเงิน 1,500 / 1,800 บาท ต่อ 1 ชิ้นงาน</span></p>
        </div>
    </div>

</div>
@endsection
