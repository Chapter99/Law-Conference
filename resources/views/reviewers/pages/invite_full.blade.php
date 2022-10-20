<html>
<head>
@include('reviewers.includes.pdf_style')
</head>
<body>
    <p style="margin-top:80px;">ที่ อว ๘๒๐๕.๐๓/๐๑๑๘</p>
    <p align="center" style="margin-top:-150px;"><img src="{{ asset('assets/images/tsu_logo.png') }}" height="150px"></p>
    <p style="padding-left:4.6in;margin-top:-83px;line-height:20px">คณะวิทยาศาสตร์ มหาวิทยาลัยทักษิณ<br>๒๒๒ หมู่ที่ ๒ ตำบลบ้านพร้าว<br>อำเภอป่าพะยอม จังหวัดพัทลุง ๙๓๒๑๐</p>
    <p style="padding-left:3.5in;margin-top:-15px;">๙  มีนาคม  ๒๕๖๕</p>
    <p style="margin-top:-15px; font-weight: bold;">เรื่อง</p>
    <p style="margin-top:-50px; padding-left:0.5in; line-height:18px;">ขอส่งผลงานเพื่อประเมินคุณภาพในงานประชุมวิชาการระดับชาติ “วิทยาศาสตร์วิจัย” ครั้งที่ ๑๓ <br />(The ๑๓<sup>th</sup> Science Research Conference, SRC๑๓)</p>
    <p style="margin-top:-25px; font-weight: bold;">เรียน</p>
    <p style="margin-top:-50px; padding-left:0.5in; line-height:18px;">{{ $reviewer->title.$reviewer->fname." ".$reviewer->lname }}</p>
    
    <p align="justify" style="text-indent:1in;margin-top: -10px;line-height:18px;">ตามที่ คณะวิทยาศาสตร์ มหาวิทยาลัยทักษิณ เป็นเจ้าภาพจัดการประชุมวิชาการระดับชาติ “วิทยาศาสตร์วิจัย”<br>ครั้งที่ ๑๓ (The ๑๓<sup>th</sup> Science Research Conference, SRC๑๓) ร่วมกับสมาคมวิทยาศาสตร์ แห่งประเทศไทยในพระบรม ราชูปถัมภ์ คณะวิทยาศาสตร์ มหาวิทยาลัยพะเยา มหาวิทยาลัยนเรศวร มหาวิทยาลัยมหาสารคาม มหาวิทยาลัยศรีนครินทรวิโรฒ และมหาวิทยาลัยบูรพา ภายใต้แนวคิด วิทยาศาสตร์วิจัยและนวัตกรรม สำหรับชีวิตวิถีใหม่ (Research and Innovation for the New Normal Life) ระหว่างวันที่ ๑๒ – ๑๓ พฤษภาคม ๒๕๖๕ ณ มหาวิทยาลัยทักษิณ จังหวัดพัทลุง นั้น</p>
    <p align="justify" style="text-indent:1in;margin-top:-10px;line-height:18px;">ในการนี้ ตามที่ท่านเป็นผู้ทรงคุณวุฒิประเมินคุณภาพผลงาน เพื่อนำเสนอในงานประชุมวิชาการระดับชาติ<br>“วิทยาศาสตร์วิจัย” ครั้งที่ ๑๓ (The ๑๓<sup>th</sup> Science Research Conference, SRC๑๓) จึงขอนำส่งผลงานเพื่อประเมินคุณภาพ โดยขอความกรุณาส่งผลการประเมินคุณภาพผ่านระบบเว็บไซต์ https://sc.sci.tsu.ac.th/src13/ คลิกเมนูสำหรับ Reviewer และใช้ E-mail: {{ $reviewer->email }} และรหัสผ่าน {{ $reviewer->password }} สำหรับ Login เข้าสู่ระบบ ทั้งนี้ขอความ<b>กรุณาส่งผลการประเมิน ภายในวันที่ ๒๕ มีนาคม ๒๕๖๕</b> เพื่อทางผู้จัดงาน จะได้ดำเนินการต่อไป</p>
    <p align="justify" style="text-indent:1in;margin-top:-10px;line-height:18px;">จึงเรียนมาเพื่อโปรดพิจารณา</p>
    <p style="padding-left:3.5in;margin-top:-25px;">ขอแสดงความนับถือ</p>
    <p style="text-indent:3.7in;margin-top:-20px;"><img src="{{ asset('assets/images/sign.jpg') }}" width="100"></p>
    <p align="center" style="padding-left:1.5in;margin-top:-20px;line-height:18px;">(ผู้ช่วยศาสตราจารย์ ดร.ธัญญา พันธ์ฤทธิ์ดำ)<br>คณบดีคณะวิทยาศาสตร์ ปฏิบัติหน้าที่แทน<br>อธิการบดีมหาวิทยาลัยทักษิณ</p>
 
    <p style="font-size:20px;margin-top: 25px;line-height:16px;">ฝ่ายวิชาการ งานประชุมวิชาการระดับชาติ “วิทยาศาสตร์วิจัย”ครั้งที่ ๑๓<br>เบอร์โทรศัพท์มือถือ: ๐๘ ๘๗๕๒ ๕๒๒๓ (ผู้ช่วยศาสตราจารย์ ดร.พีรนาฏ คิดดี)<br>ไปรษณีย์อิเล็กทรอนิกส์: src๑๓tsu@gmail.com</p>
</body>
</html>
