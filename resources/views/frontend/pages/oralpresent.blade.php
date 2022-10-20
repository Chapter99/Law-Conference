@extends('frontend.layouts.default_layout')
@section('title') Home @parent @endsection

@section('content')
<div class="container mt-5 pt-4">
    <div class="card border-primary">
        <div class="card-body p-4">
            <h4 class="mt-3 text-pt-orange text-center">แนวปฏิบัติการนำเสนอผลงานวิจัยภาคบรรยาย (Oral Presentation)</h4>
            <h5 class="text-center text-primary">การประชุมวิชาการระดับชาติ มหาวิทยาลัยทักษิณ ครั้งที่ 31 ประจำปี 2564 ผ่านการประชุมออนไลน์ โปรแกรม Webex Event</h5>
            <p class="mt-3 text-justify" style="text-indent: 2.5em;">เนื่องด้วยในสถานการณ์การระบาดของโรคติดเชื้อไวรัสโคโรนา 2019 (COVID-19) ที่เกิดขึ้นอย่างต่อเนื่องมาถึงปัจจุบันและได้ส่งผลกระทบอย่างกว้างขวางในประเทศต่าง ๆ รวมถึงประเทศไทย นั้น โดยเฉพาะอย่างยิ่งการปรับตัวในยุควิถีใหม่ (New Normal) เป็นแนวทางที่หลาย ๆ คนจะต้องปรับเปลี่ยนวิถีชีวิตในรูปแบบต่าง ๆ ไปพร้อม ๆ กัน ดังนั้น ผู้จัดการประชุมฯ จึงขอเปลี่ยนแปลงรูปแบบการนำเสนอผลงานภาคบรรยายไปสู่แบบระบบออนไลน์ในการประชุมวิชาการระดับชาติ มหาวิทยาลัยทักษิณ ครั้งที่ 31 ประจำปี 2564 โดยมีข้อกำหนด รายละเอียดดังนี้</p>
            <ol>
                <li>เวลา 08.00-08.30 น. ผู้นำเสนอผลงานภาคบรรยาย (Oral Presentation) ทุกท่าน login เข้าร่วมประชุมผ่านโปรแกรม Webex Event (ห้องรวม) <a href="https://thaksin.webex.com/thaksin/j.php?MTID=m90b304bb7d1d191d7a6c3759dfaabade" target="_blank">https://thaksin.webex.com/thaksin/j.php?MTID=m90b304bb7d1d191d7a6c3759dfaabade</a> เข้าร่วมพิธีเปิดงานประชุมวิชาการฯ</li>
                <li>ช่วงเวลาการนำเสนอผลงานทุกห้อง ซึ่งแต่ละห้องจะเริ่มเวลา 10.15 น. เป็นต้นไป โดยผู้นำเสนอผลงานแยกห้องการนำเสนอในแต่ละ Session ผ่าน link ดังนี้ <br><br>
                    <table class="table table-bordered">
                        <tr>
                            <th class="text-center">เวลาการนำเสนอ</th>
                            <th class="text-center">Session</th>
                            <th class="text-center">จำนวนบทความ</th>
                        </tr>
                        <tr>
                            <td class="text-center">10.15-16.15 น.</td>
                            <td>Session 1  นวัตกรรมและผลงานสร้างสรรค์ <br><a href="https://thaksin.webex.com/thaksin/j.php?MTID=md43a1afe70a10756be99aefcc09551a7" target="_blank">https://thaksin.webex.com/thaksin/j.php?MTID=md43a1afe70a10756be99aefcc09551a7</a></td>
                            <td class="text-center">20 เรื่อง</td>
                        </tr>
                        <tr>
                            <td class="text-center">10.15-16.30 น.</td>
                            <td>Session 2  วิทยาศาสตร์ชีวภาพและเกษตรศาสตร์ <br><a href="https://thaksin.webex.com/thaksin/j.php?MTID=m47ceb531f686bbc89dc4f083121f3749" target="_blank">https://thaksin.webex.com/thaksin/j.php?MTID=m47ceb531f686bbc89dc4f083121f3749</a></td>
                            <td class="text-center">21 เรื่อง</td>
                        </tr>
                        <tr>
                            <td class="text-center">10.15-14.00 น.</td>
                            <td>Session 3  วิทยาศาสตร์เคมีและเภสัช <br><a href="https://thaksin.webex.com/thaksin/j.php?MTID=m45b6d89e4a66d9d28076141b24f892b6" target="_blank">https://thaksin.webex.com/thaksin/j.php?MTID=m45b6d89e4a66d9d28076141b24f892b6</a></td>
                            <td class="text-center">11 เรื่อง</td>
                        </tr>
                        <tr>
                            <td class="text-center">10.15-15.45 น.</td>
                            <td>Session 4  ฟิสิกส์ศึกษา ฟิสิกส์ประยุกต์และวิศวกรรมศาสตร์ <br><a href="https://thaksin.webex.com/thaksin/j.php?MTID=mf03c6cb33ab7e660b59e3de193ef359b" target="_blank">https://thaksin.webex.com/thaksin/j.php?MTID=mf03c6cb33ab7e660b59e3de193ef359b</a></td>
                            <td class="text-center">18 เรื่อง</td>
                        </tr>
                        <tr>
                            <td class="text-center">10.15-13.30 น.</td>
                            <td>Session 5  คณิตศาสตร์และคอมพิวเตอร์ <br><a href="https://thaksin.webex.com/thaksin/j.php?MTID=mfbe8889ccb98a8feb11746f171198e7c" target="_blank">https://thaksin.webex.com/thaksin/j.php?MTID=mfbe8889ccb98a8feb11746f171198e7c</a></td>
                            <td class="text-center">9 เรื่อง</td>
                        </tr>
                        <tr>
                            <td class="text-center">10.15-11.30 น.</td>
                            <td>Session 6  วิทยาศาสตร์สุขภาพ <br><a href="https://thaksin.webex.com/thaksin/j.php?MTID=m50abe429775609530afa6f62c8749722" target="_blank">https://thaksin.webex.com/thaksin/j.php?MTID=m50abe429775609530afa6f62c8749722</a></td>
                            <td class="text-center">5 เรื่อง</td>
                        </tr>
                        <tr>
                            <td class="text-center">10.15-12.00 น.</td>
                            <td>Session 7 การศึกษา <br><a href="https://thaksin.webex.com/thaksin/j.php?MTID=m8731088c3958f6d35ed2cf5e93167e18" target="_blank">https://thaksin.webex.com/thaksin/j.php?MTID=m8731088c3958f6d35ed2cf5e93167e18</a></td>
                            <td class="text-center">7 เรื่อง</td>
                        </tr>
                        <tr>
                            <td class="text-center">10.15-13.30 น.</td>
                            <td>Session 8 มนุษยศาสตร์ <br><a href="https://thaksin.webex.com/thaksin/j.php?MTID=mf29b7c660a809932e4433d0f2bee8e46" target="_blank">https://thaksin.webex.com/thaksin/j.php?MTID=mf29b7c660a809932e4433d0f2bee8e46</a></td>
                            <td class="text-center">9 เรื่อง</td>
                        </tr>
                        <tr>
                            <td class="text-center">10.15-16.45 น.</td>
                            <td>Session 9 สังคมศาสตร์ <br><a href="https://thaksin.webex.com/thaksin/j.php?MTID=m978a9d3988a3cacb96c3bb924049ff87" target="_blank">https://thaksin.webex.com/thaksin/j.php?MTID=m978a9d3988a3cacb96c3bb924049ff87</a></td>
                            <td class="text-center">25 เรื่อง</td>
                        </tr>
                        <tr>
                            <td class="text-center">10.15-13.15 น.</td>
                            <td>Session 10 บริหารธุรกิจและเศรษฐศาสตร์ <br><a href="https://thaksin.webex.com/thaksin/j.php?MTID=m4612ed18e95e63b2dc908d644677bc79" target="_blank">https://thaksin.webex.com/thaksin/j.php?MTID=m4612ed18e95e63b2dc908d644677bc79</a></td>
                            <td class="text-center">8 เรื่อง</td>
                        </tr>
                        <tr>
                            <td class="text-center">10.15-11.00 น.</td>
                            <td>Session 11 นวัตกรรมสังคม <br><a href="https://thaksin.webex.com/thaksin/j.php?MTID=mcb98ef89d8b0a0801cff8a4b8a0331b9" target="_blank">https://thaksin.webex.com/thaksin/j.php?MTID=mcb98ef89d8b0a0801cff8a4b8a0331b9</a></td>
                            <td class="text-center">3 เรื่อง</td>
                        </tr>
                    </table>
                <b>หมายเหตุ :</b> ผู้นำเสนอสามารถดูลำดับการนำเสนอผลงานได้ตามไฟล์สูจิบัตรการประชุมวิชาการฯ<br><br> </li>
                <li>ให้ผู้นำเสนอจัดเตรียมไฟล์การนำเสนอ Power point หรือวิดีโอ เพื่อใช้ในการนำเสนอ พร้อมเสนอไฟล์ (แชร์ไฟล์การนำเสนอด้วยตนเอง) และบรรยายพร้อมๆ กัน</li>
                <li>กรณีผู้นำเสนอผลงานไม่ Login เข้าห้องนำเสนอ หรือยกเลิกการนำเสนอในวันที่ 20 พฤษภาคม 2564  ผู้นำเสนอในลำดับถัดไปจะเลื่อนเวลาขึ้นมาแทน ดังนั้น ผู้นำเสนอผลงานทุกท่านต้องอยู่ในห้องนำเสนอตลอดเวลา  เนื่องจากเวลาอาจมีการเปลี่ยนแปลงได้ </li>
                <li>กรณีผู้นำเสนอมีปัญหาระบบเครือข่ายอินเตอร์เน็ตขัดข้องช่วงถึงเวลาการนำเสนอ แจ้งให้ผู้นำเสนอ สามารถนำเสนอได้หลังจากผู้นำเสนอผลงานคนสุดท้ายในห้อง Session นั้นๆ เพื่อไม่ให้ส่งผลกระทบต่อลำดับการนำเสนองานของท่านอื่น</li>
                <li>ผู้นำเสนอมีเวลาการนำเสนอ จำนวน 10 นาที เวลาซักถาม 5 นาที รวม 15 นาที 
                    <ol>
                        <li>เมื่อผู้นำเสนอไปแล้ว 8 นาที จะมีผู้ดำเนินรายการกดกริ่ง สั้น 1 ครั้ง</li>
                        <li>เมื่อหมดเวลา 10 นาที ผู้ดำเนินรายการจะกดกริ่งยาว 1 ครั้ง เพื่อให้ผู้นำเสนอหยุดการนำเสนอ และเตรียมตัวตอบคำถามจากผู้ทรงคุณวุฒิตัดสินการนำเสนอผลงาน</li>
                    </ol>
                </li>
                <li>ผู้นำเสนอแต่งกายสุภาพ และเปิดกล้องตลอดการนำเสนอผลงาน</li>
                <li>หลังจากเสร็จสิ้นการนำเสนอผลงานในห้องที่ท่านนำเสนอผลงานครบทุกเรื่องแล้ว ท่านจะออกมาอยู่ในห้องรวมเพื่อเข้าร่วมพิธีปิดการประชุม เวลา 17.00 น. และรอฟังประกาศผลรางวัลการนำเสนอผลงานวิจัยเด่น (ระหว่างนี้ขอความอนุเคราะห์ท่านตอบแบบสอบความคิดเห็นผ่านระบบออนไลน์)</li>
                <li>ผู้นำเสนอทุกท่านสามารถดูคู่มือแนะนำการใช้ระบบ Webex Event ในหน้าเวบไซต์การประชุมวิชาการฯ</li>
                <li>กรณีที่ผู้นำเสนอผลงานภาคบรรยายไม่มานำเสนอผลงาน ภายในวันเวลาที่กำหนดนั้น ถือว่าท่านสละสิทธิ์และผลงานจะไม่ได้รับการตีพิมพ์เผยแพร่ในเล่ม Abstract Book การประชุมวิชาการระดับชาติฯ ในครั้งนี้</li>
            </ol>
            <p>ติดต่อสอบถามเพิ่มเติมได้ที่ คุณพิมพ์ณดา  มณีวงค์/คุณรานี  ซุ่นเซ่ง <br>
                สถาบันวิจัยและพัฒนา มหาวิทยาลัยทักษิณ วิทยาเขตพัทลุง โทรศัพท์ 0-7460-9600 ต่อ 7254 <br>
                มือถือ 08-1540-7304 เว็บไซต์ http://conference2021.tsu.ac.th <br>
                E-mail : conferencerdi.tsu@gmail.com</p>
        </div>
    </div>
</div>

@endsection
