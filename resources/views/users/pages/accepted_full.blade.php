<html>
<head>
@include('users.includes.pdf_style2')
</head>
<body>

    <p style="margin-top:55px;">ที่ อว 8206.04/ว 0184</p>
    <p align="center" style="margin-top:-150px;"><img src="{{ asset('assets/images/tsu_logo.png') }}" height="140px"></p>
    <p style="padding-left:4.4in;margin-top:-100px;line-height:18px">สถาบันวิจัยและพัฒนา<br>มหาวิทยาลัยทักษิณ วิทยาเขตพัทลุง<br>ต.บ้านพร้าว อ.ป่าพะยอม จ.พัทลุง 93210</p>
    <p style="padding-left:3.4in;margin-top:-10px;">30 เมษายน 2564</p>
    <p style="margin-top:-20px;">เรื่อง</p>
    <p style="margin-top:-51px;margin-left:45px;line-height:18px;">ตอบรับการตีพิมพ์บทความวิจัยในรายงานการประชุมวิชาการ (Proceedings) ในการประชุมวิชาการระดับชาติ มหาวิทยาลัยทักษิณ ครั้งที่ 31 ประจำปี 2564</p>
    <p style="margin-top:-25px;">เรียน&nbsp;&nbsp;&nbsp; @if($user->academic != NULL){{ $user->academic }}@else{{ $user->title }}@endif{{ $user->fname." ".$user->lname }}</p>
    <p align="justify" style="text-indent:1in;margin-top:-10px;line-height:18px;">ด้วยสถาบันวิจัยและพัฒนา ร่วมกับสำนักส่งเสริมการบริการวิชาการและภูมิปัญญาชุมชน และสำนักบ่มเพาะ<br>วิชาการเพื่อวิสาหกิจในชุมชน มหาวิทยาลัยทักษิณ กำหนดจัดการประชุมวิชาการระดับชาติมหาวิทยาลัยทักษิณ ครั้งที่ 31 ประจำปี 2564 <b>ภายใต้หัวข้อ : วิจัยกับการนวัตกรรมสังคมยุคหลังโควิด-19 (Research and Social Innovations in the Post COVID-19 Era) ในวันที่ 20-21 พฤษภาคม 2564</b> โดยมีวัตถุประสงค์เพื่อเผยแพร่ผลงานวิจัยและแลกเปลี่ยน เรียนรู้ ความรู้ ประสบการณ์ด้านการวิจัย จากสถานการณ์การระบาดของโรคติดเชื้อไวรัสโคโรนา 2019 (COVID-19) ที่เกิดขึ้น อย่างต่อเนื่องมาถึงปัจจุบันและได้ส่งผลกระทบ อย่างกว้างขวางในประเทศต่าง ๆ รวมถึงประเทศไทย นั้น โดยเฉพาะอย่างยิ่ง การปรับตัวในยุควิถีใหม่ (New Normal) เป็นแนวทางที่หลายคนจะต้องปรับเปลี่ยนวิถีชีวิตในรูปแบบต่าง ๆ ไปพร้อม ๆ กัน ดังนั้น ผู้จัดการประชุมฯ จึงขอเปลี่ยนแปลงรูปแบบการนำเสนอผลงานภาคบรรยายและภาคโปสเตอร์ไปสู่แบบระบบออนไลน์ ในการประชุมดังกล่าว</p>
    <p align="justify" style="text-indent:1in;margin-top:-10px;line-height:18px;">ทั้งนี้ ตามที่ท่านได้ลงทะเบียนเข้าร่วมเสนอผลงานวิจัยในงานประชุมวิชาการฯ บัดนี้ ผู้ทรงคุณวุฒิได้พิจารณา<br>ผลงานวิจัยเรียบร้อยแล้ว และขอแจ้งให้ทราบว่าผลงานของ @if($user->academic != NULL){{ $user->academic }}@else{{ $user->title }}@endif{{ $user->fname." ".$user->lname }}  ผลงานวิจัยเรื่อง {{ $paper->title }} ได้รับการพิจารณา ให้นำเสนอ ในการประชุมวิชาการระดับชาติฯ และมีการเผยแพร่ตีพิมพ์ผลงานวิจัยเรื่องเต็ม (Full Paper) ในรายงาน การประชุมวิชาการระดับชาติ มหาวิทยาลัยทักษิณ ครั้งที่ 31 ประจำปี 2564 พร้อมจะเผยแพร่ออนไลน์ http://conference2021.tsu.ac.th/ และ https://www.rdi.tsu.ac.th/ภายในวันที่ 31 เดือนพฤษภาคม 2564 </p>
    <p align="justify" style="text-indent:1in;margin-top:-10px;line-height:18px;">จึงเรียนมาเพื่อทราบ</p>
    <p style="text-indent:4.3in;margin-top:-20px;">ขอแสดงความนับถือ</p>
    <p style="text-indent:4.5in;margin-top:-20px;"><img src="{{ asset('assets/images/sign.jpg') }}" width="100"></p>
    <p style="text-indent:3.7in;margin-top:-25px;">(รองศาสตราจารย์ ดร.ณฐพงศ์  จิตรนิรัตน์)</p>
    <p style="text-indent:3.7in;margin-top:-35px;">รองอธิการบดีฝ่ายวิจัยและบริการวิชาการ</p>
    <p style="text-indent:3.5in;margin-top:-35px;">ปฏิบัติหน้าที่แทน อธิการบดีมหาวิทยาลัยทักษิณ</p>
    <p style="font-size:20px;margin-top:15px;line-height:16px;">ผู้ประสานงาน : นางสาวรานี  ซุ่นเซ่ง<br>โทรศัพท์ 0-7460-9600 ต่อ 7254, 7256 และ 08-1540-7304<br>E-mail : conferencerdi.tsu@gmail.com</p>
</body>
</html>
