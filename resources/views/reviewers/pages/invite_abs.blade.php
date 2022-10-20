<html>
<head>
@include('reviewers.includes.pdf_style')
</head>
<body>
    <img src="{{ asset('assets/images/tsu_logo.png') }}" height="90px" style="position: absolute;float:left;margin-top:-30px;">
    <p style="font-size: 36px;margin-left: auto;margin-right: auto;width: 4em;margin-top:0px;"><b>บันทึกข้อความ</b></p>
    <p style="margin-top:-35px;line-height:25px"><span style="font-size:24px;"><b>ส่วนงาน</b></span>&nbsp;&nbsp;&nbsp; สถาบันวิจัยและพัฒนา  มหาวิทยาลัยทักษิณ &nbsp;&nbsp;&nbsp;  โทร. 7254<br>
    <span style="font-size:24px;"><b>ที่</b></span>&nbsp;&nbsp;&nbsp; อว 8206.04/ว 0189 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:24px;"><b>วันที่</b></span>&nbsp;&nbsp;&nbsp;&nbsp; 28  มกราคม  2564<br>
    <span style="font-size:24px;"><b>เรื่อง</b></span>&nbsp;&nbsp;&nbsp; ขอเชิญเป็นผู้ทรงคุณวุฒิประเมินคุณภาพผลงานเพื่อนำเสนอในงานประชุมวิชาการฯ</p>
    <p style="margin-top:-10px;">เรียน&nbsp;&nbsp; {{ $reviewer->title.$reviewer->fname." ".$reviewer->lname }}</p>
    <p align="justify" style="text-indent:1in;margin-top:-10px;line-height:22px;">ด้วยสถาบันวิจัยและพัฒนา ร่วมกับสำนักส่งเสริมการบริการวิชาการและภูมิปัญญาชุมชน และสำนัก<br>บ่มเพาะวิชาการเพื่อวิสาหกิจในชุมชน มหาวิทยาลัยทักษิณ กำหนดจัดการประชุมวิชาการระดับชาติมหาวิทยาลัย ทักษิณ ครั้งที่ 31 ประจำปี 2564 <b>ภายใต้หัวข้อ : วิจัยกับการนวัตกรรมสังคมยุคหลังโควิด-19 (Research and Social Innovations in the Post COVID-19 Era) ในวันที่ 20-21 พฤษภาคม 2564</b> โดยมีวัตถุประสงค์ เพื่อเผยแพร่ผลงานวิจัยและแลกเปลี่ยนเรียนรู้ ความรู้ ประสบการณ์ด้านการวิจัย ซึ่งในงานดังกล่าวได้มีรูปแบบการ นำเสนอผลงานวิจัยภาคบรรยายและภาคโปสเตอร์ ดังนั้น เพื่อให้ผลงานที่นำเสนอมีคุณภาพ จึงขอเชิญท่านเป็น ผู้ทรงคุณวุฒิประเมินคุณภาพผลงานเพื่อนำเสนอในการประชุมวิชาการดังกล่าว ทั้งนี้ ขอความกรุณาส่งผลการพิจารณา มายังสถาบันวิจัยและพัฒนา ผ่านระบบ <a href='http://conference2021.tsu.ac.th'>http://conference2021.tsu.ac.th</a> <b>ภายในวันที่ 12 กุมภาพันธ์ 2564</b> เพื่อจะได้ดำเนินการต่อไป</p>
    <p align="justify" style="text-indent:1in;margin-top:-10px;line-height:22px;">จึงเรียนมาเพื่อโปรดพิจารณา</p>
    <p style="text-indent:4.5in;"><img src="{{ asset('assets/images/sign.jpg') }}" width="130"></p>
    <p style="text-indent:3.7in;margin-top:-20px;">(รองศาสตราจารย์ ดร.ณฐพงศ์  จิตรนิรัตน์)</p>
    <p style="text-indent:3.7in;margin-top:-30px;">รองอธิการบดีฝ่ายวิจัยและบริการวิชาการ</p>
    <p style="text-indent:3.5in;margin-top:-30px;">รักษาการแทนผู้อำนวยการสถาบันวิจัยและพัฒนา</p>
    <p style="padding-top:-10px;line-height:22px;">ผู้ประสานงาน : นางสาวรานี  ซุ่นเซ่ง<br>โทรศัพท์ 08-1540-7304, 08-9879-8395<br>E-mail : conferencerdi.tsu@gmail.com</p>
</body>
</html>
