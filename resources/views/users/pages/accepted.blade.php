<html>
<head>
@include('users.includes.pdf_style')
</head>
<body>

    <p style="margin-top:80px;">ที่ อว 8206.04/ว 0096</p>
    <p align="center" style="margin-top:-150px;"><img src="{{ asset('assets/images/tsu_logo.png') }}" height="150px"></p>
    <p style="padding-left:4.4in;margin-top:-83px;line-height:20px">สถาบันวิจัยและพัฒนา<br>มหาวิทยาลัยทักษิณ วิทยาเขตพัทลุง<br>ต.บ้านพร้าว อ.ป่าพะยอม จ.พัทลุง 93210</p>
    <p style="padding-left:3.5in;margin-top:-10px;">9  กุมภาพันธ์  2564</p>
    <p style="margin-top:-20px;">เรื่อง&nbsp;&nbsp;&nbsp; ตอบรับการเข้าร่วมนำเสนอผลงานการประชุมวิชาการระดับชาติมหาวิทยาลัยทักษิณ ครั้งที่ 31 ประจำปี 2564</p>
    <p style="margin-top:-25px;">เรียน&nbsp;&nbsp; @if($user->academic != NULL){{ $user->academic }}@else{{ $user->title }}@endif{{ $user->fname." ".$user->lname }}</p>
    <p align="justify" style="text-indent:1in;margin-top:-10px;line-height:18px;">ด้วยสถาบันวิจัยและพัฒนา ร่วมกับสำนักส่งเสริมการบริการวิชาการและภูมิปัญญาชุมชน และสำนัก<br>บ่มเพาะวิชาการเพื่อวิสาหกิจในชุมชน มหาวิทยาลัยทักษิณ กำหนดจัดการประชุมวิชาการระดับชาติมหาวิทยาลัย ทักษิณ ครั้งที่ 31 ประจำปี 2564 <b>ภายใต้หัวข้อ : วิจัยกับการนวัตกรรมสังคมยุคหลังโควิด-19 (Research and Social Innovations in the Post COVID-19 Era) ในวันที่ 20-21 พฤษภาคม 2564 ณ อำเภอหาดใหญ่ จังหวัดสงขลา</b> โดยมีวัตถุประสงค์เพื่อเผยแพร่ผลงานวิจัยและแลกเปลี่ยนเรียนรู้ ความรู้ ประสบการณ์ด้านการวิจัย</p>
    <p align="justify" style="text-indent:1in;margin-top:-10px;line-height:18px;">ทั้งนี้ ตามที่ท่านได้ลงทะเบียนเข้าร่วมนำเสนอผลงานในการประชุมวิชาการระดับชาติฯ  <b>ผลงานวิจัย<br>เรื่อง {{ $paper->title }}</b> บัดนี้ ผลงานดังกล่าวได้รับการพิจารณา ให้นำเสนอ <b>{{ config('global.present')[$paper->present] }}</b>ในวันที่ 20-21 พฤษภาคม 2564 ดังนั้น ขอให้ท่านยืนยัน การเข้าร่วมนำเสนอผลงาน ผ่านระบบออนไลน์  http://conference2021.tsu.ac.th ภายในวันที่ 8 มีนาคม 2564</p>
    <p align="justify" style="text-indent:1in;margin-top:-10px;line-height:18px;">จึงเรียนมาเพื่อทราบ</p>
    <p style="text-indent:4.3in;margin-top:-20px;">ขอแสดงความนับถือ</p>
    <p style="text-indent:4.5in;margin-top:-20px;"><img src="{{ asset('assets/images/sign.jpg') }}" width="120"></p>
    <p style="text-indent:3.7in;margin-top:-25px;">(รองศาสตราจารย์ ดร.ณฐพงศ์  จิตรนิรัตน์)</p>
    <p style="text-indent:3.7in;margin-top:-35px;">รองอธิการบดีฝ่ายวิจัยและบริการวิชาการ</p>
    <p style="text-indent:3.5in;margin-top:-35px;">ปฏิบัติหน้าที่แทน อธิการบดีมหาวิทยาลัยทักษิณ</p>
    <p style="font-size:20px;margin-top:15px;line-height:16px;">ผู้ประสานงาน : นางสาวรานี  ซุ่นเซ่ง / นายชาญณรงค์  คงทน<br>โทรศัพท์ 0-7460-9600 ต่อ 7254, 7256 และ 08-1540-7304<br>E-mail : conferencerdi.tsu@gmail.com</p>
</body>
</html>
