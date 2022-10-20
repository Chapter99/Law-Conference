@extends('frontend.layouts.default_layout')
@section('title') วิทยากรบรรยาย @parent @endsection

@section('content')
<div class="container mt-5 pt-4">
    <div class="card">
        <div class="card-header bg-pt-purple text-light">วิทยากรบรรยาย </div>
        <div class="card-body">
            <table class="table table-hover">
                <tr class="bg-light">
                    <th class="text-center">กลุ่ม</th>
                    <th class="text-center">ชื่อ-สกุล</th>
                    <th class="text-center">มหาวิทยาลัย</th>
                </tr>
                <tr>
                    <td><b>กลุ่มที่ 1</b>  สาขาวิชาชีววิทยาและการประยุกต์ วิทยาศาสตร์การประมง วิทยาศาสตร์สิ่งแวดล้อม วิทยาศาสตร์การเกษตร วิทยาศาสตร์สุขภาพ        จุลชีววิทยา วิทยาศาสตร์เทคโนโลยีชีวภาพ วิทยาศาสตร์และเทคโนโลยีทางอาหาร</td>
                    <td>ผศ.ดร.สมพงศ์  โอทอง<br>Sustainable fuel and chemical production by Clostridium thailandense as CO2 based bioeconomy</td>
                    <td>สาขาวิชาชีววิทยา คณะวิทยาศาสตร์ มหาวิทยาลัยทักษิณ</td>
                </tr>
                <tr>
                    <td><b>กลุ่มที่ 2</b> สาขาวิชาเคมี เคมีประยุกต์ และเคมีอุตสาหกรรม</td>
                    <td>อ.ดร.ชัยพัฒน์ ลาพินี  <br>กลไกการดูดซับอาร์เซนิกด้วยโลหะออกไซด์ (Adsorption mechanism of arsenic using metal oxides)</td>
                    <td>สาขาวิชาเคมี คณะวิทยาศาสตร์ มหาวิทยาลัยพะเยา</td>
                </tr>
                <tr>
                    <td><b>กลุ่มที่ 3</b> สาขาวิชาคณิตศาสตร์ คณิตศาสตร์ประยุกต์  และสถิติ</td>
                    <td>รศ.ดร.ปิยภัทร บุษบาบดินทร์ <br> “สร้างสรรค์งานวิจัย นวัตกรรมคณิตศาสตร์และสถิติอย่างไร...ไม่ให้ขึ้นหิ้ง”</td>
                    <td>ภาควิชาคณิตศาสตร์ คณะวิทยาศาสตร์ มหาวิทยาลัยมหาสารคาม</td>
                </tr>
                <tr>
                    <td><b>กลุ่มที่ 4</b> สาขาวิทยาศาสตร์ศึกษา และคณิตศาสตร์ศึกษา</td>
                    <td>ผศ.ดร.จรรยา  ดาสา  <br>“การเรียนรู้แบบสืบเสาะเชิงรุกในห้องปฏิบัติการวิทยาศาสตร์สำหรับนิสิตระดับปริญญาตรี”</td>
                    <td>คณะวิทยาศาสตร์ มหาวิทยาลัยศรีนครินทรวิโรฒ </td>
                </tr>
                <tr>
                    <td><b>กลุ่มที่ 5</b> สาขาวิชาคอมพิวเตอร์ เทคโนโลยีสารสนเทศ วิทยาการข้อมูล </td>
                    <td>รศ.ดร.จักรกฤษณ์ เสน่ห์ นมะหุต <br>“สู่วิถีการดำเนินชีวิตใหม่ด้วยนวัตกรรมอาหารอัจฉริยะ”</td>
                    <td>ภาควิชาวิทยาการคอมพิวเตอร์และเทคโนโลยีสารสนเทศ  คณะวิทยาศาสตร์ มหาวิทยาลัยนเรศวร</td>
                </tr>
                <tr>
                    <td><b>กลุ่มที่ 6</b> สาขาวิชาฟิสิกส์ พลังงาน และวัสดุศาสตร์</td>
                    <td>รศ.ดร.จอมภพ แววศักดิ์ <br>“การประเมินศักยภาพพลังงานลมนอกชายฝั่งทะเล   อ่าวไทย” </td>
                    <td>สาขาวิชาฟิสิกส์  คณะวิทยาศาสตร์ มหาวิทยาลัยทักษิณ</td>
                </tr>
                <tr>
                    <td><b>กลุ่มที่ 7</b> สาขาวิชาวิทยาศาสตร์นวัตกรรมเชิงพาณิชย์</td>
                    <td>รศ.ดร.ยุภาพร สมีน้อย <br>“นวัตกรรมชุดตรวจแบบกระดาษสำหรับวิเคราะห์ฟอร์มาลินในอาหาร” </td>
                    <td>มหาวิทยาลัยบูรพา</td>
                </tr>
                <tr>
                    <td><b>กลุ่มที่ 9</b> การนำเสนอแบบบรรยายของนิสิตเครือเทางาม Research to Market (R2M)</td>
                    <td>นายสุเทพ ไชยธานี <br>“Research to Market (R2M)”</td>
                    <td>มหาวิทยาลัยบูรพา</td>
                </tr>
            </table>
        </div>
    </div>

</div>
@endsection
