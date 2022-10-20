@extends('frontend.layouts.default_layout')
@section('title') ช่องทางการตีพิมพ์ @parent @endsection

@section('content')
<div class="container mt-5 pt-4">
    <div class="card border-primary">
        <div class="card-body p-2">
            <h4 class="mt-3 text-pt-orange text-center">ช่องทางการตีพิมพ์</h4>
            <p class="mt-3">ผู้นำเสนอผลงานลงทะเบียน และจัดส่งบทคัดย่อ (Abstract)เพื่อนำเสนอภาคบรรยาย/ภาคโปสเตอร์ ผ่านระบบออนไลน์
            พร้อมเลือกช่องทางการตีพิมพ์ได้ 3 ช่องทาง</p>


            <div class="row">
                <div class="col-md-12">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-left"><i class="fa fa-bookmark text-primary mr-2"></i>
                            <b class="text-danger">ช่องทางที่ 1</b> ตีพิมพ์เฉพาะบทคัดย่อ
                            ในเล่มเอกสารรวมบทคัดย่อ (Abstract Book) ผู้นำเสนอส่งผลงานเฉพาะบทคัดย่อเท่านั้น
                            โดยผลงานที่ผ่านการพิจารณาให้นำเสนอจะได้รับการตีพิมพ์ ทั้งนี้
                            จะต้องปรับปรุงแก้ไขบทคัดย่อให้ถูกต้องตามรูปแบบข้อกำหนดอย่างเคร่งครัดหากไม่สมบูรณ์หรือไม่ถูกต้องจะส่งคืนผู้นำเสนอแก้ไขก่อนการตีพิมพ์ต่อไป
                            เพื่อนำเสนอภาคบรรยายและภาคโปสเตอร์</li>
                        <li class="list-group-item text-left"><i class="fa fa-bookmark text-primary mr-2"></i>
                            <b class="text-success">ช่องทางที่ 2</b> ตีพิมพ์บทคัดย่อใน (Abstract Book)
                            และตีพิมพ์บทความวิจัยเรื่องเต็มในรายงานการประชุมวิชาการ (Proceeding)
                            ผู้นำเสนอผลงานจะต้องส่งบทคัดย่อ (Abstract) และบทความวิจัยเรื่องเต็ม (Manuscript)
                            โดยผลงานที่ผ่านพิจารณาให้นำเสนอจะได้รับการตีพิมพ์ ทั้งนี้
                            จะต้องปรับปรุงแก้ไขบทคัดย่อให้ถูกต้องตามรูปแบบข้อกำหนดอย่างเคร่งครัดหากไม่สมบูรณ์หรือไม่ถูกต้องจะส่งคืนผู้นำเสนอแก้ไขก่อนการตีพิมพ์ต่อไป
                            เพื่อนำเสนอภาคบรรยายและภาคโปสเตอร์ และบทความวิจัยเรื่องเต็ม (Manuscript)
                            เป็นผลงานที่ผ่านการประเมินคุณภาพบทความวิจัยจากผู้ทรงคุณวุฒิ
                            ตีพิมพ์ในรายงานการประชุมวิชาการ (Proceeding)  </li>
                        <li class="list-group-item text-left"><i class="fa fa-bookmark text-primary mr-2"></i>
                            <b class="text-secondary">ช่องทางที่ 3</b> ตีพิมพ์บทคัดย่อใน (Abstract Book)
                            และตีพิมพ์บทความฉบับสมบูรณ์ (Full paper) ในวารสาร ผู้นำเสนอผลงานจะต้องส่งบทคัดย่อ
                            (Abstract) และบทความฉบับสมบูรณ์ (Full paper)
                            โดยผลงานที่ผ่านพิจารณาให้นำเสนอจะได้รับการตีพิมพ์ ทั้งนี้
                            จะต้องปรับปรุงแก้ไขบทคัดย่อให้ถูกต้องตามรูปแบบข้อกำหนดอย่างเคร่งครัดหากไม่สมบูรณ์หรือไม่ถูกต้องจะส่งคืนผู้นำเสนอแก้ไขก่อนการตีพิมพ์ต่อไป
                            เพื่อนำเสนอภาคบรรยายและภาคโปสเตอร์ และบทความฉบับสมบูรณ์ (Full paper)
                            เป็นผลงานที่ผ่านการประเมินคุณภาพบทความจากผู้ทรงคุณวุฒิ
                            ตีพิมพ์ในวารสาร ดังนี้
                            <table class="table table-hover table-bordered">
                                <tr>
                                    <th class="text-center">ชื่อวารสาร</th>
                                    <th class="text-center">จำนวนบทความที่รับ</th>
                                    <th class="text-center">ภาษา</th>
                                    <th class="text-center">ฉบับที่ตีพิมพ์</th>
                                    <th class="text-center">Website</th>
                                </tr>
                                <tr>
                                    <td>NU. International Journal of Science </td>
                                    <td class="text-center">12</td>
                                    <td class="text-center">อังกฤษ</td>
                                    <td>Vol 19, No 1 (2022) or  Vol 19, No 2 (2022)</td>
                                    <td><a href="http://www.sci.nu.ac.th/sciencejournal/index.php/journal" target="_blank">http://www.sci.nu.ac.th/sciencejournal/index.php/journal</a></td>
                                </tr>
                                <tr>
                                    <td>Burapha Science Journal  (วารสารวิทยาศาสตร์บูรพา)</td>
                                    <td class="text-center">10</td>
                                    <td class="text-center">ไทย/อังกฤษ</td>
                                    <td>Vol 28, No 1 (2023) or  Vol 28, No 2 (2023)</td>
                                    <td><a href="http://science.buu.ac.th/part/buuscij/" target="_blank">http://science.buu.ac.th/part/buuscij/</a></td>
                                </tr>
                                <tr>
                                    <td>UP International Journal of Science and Technology (UPJST) </td>
                                    <td class="text-center">15</td>
                                    <td class="text-center">อังกฤษ</td>
                                    <td>Vol 2, No 1 (2023) or  Vol 2, No 2 (2023)</td>
                                    <td><a href="https://ph01.tci-thaijo.org/index.php/upjst" target="_blank">https://ph01.tci-thaijo.org/index.php/upjst</a></td>
                                </tr>
                                <tr>
                                    <td>Srinakharinwirot Science Journal</td>
                                    <td class="text-center">10</td>
                                    <td class="text-center">อังกฤษ</td>
                                    <td>Vol 38, No 1 (2022) and Vol 38, No 2 (2022) </td>
                                    <td><a href="http://ejournals.swu.ac.th/index.php/ssj" target="_blank">http://ejournals.swu.ac.th/index.php/ssj</a></td>
                                </tr>
                                <tr>
                                    <td>Science Technology and Engineering Journal (STEJ)</td>
                                    <td class="text-center">ไม่จำกัดจำนวน</td>
                                    <td class="text-center">อังกฤษ</td>
                                    <td>Vol 8, No 1 (2022) and  Vol 8, No 2 (2022)</td>
                                    <td><a href="https://ph02.tci-thaijo.org/index.php/stej" target="_blank">https://ph02.tci-thaijo.org/index.php/stej</a></td>
                                </tr>
                                <tr>
                                    <td>ASEAN Journal of Scientific and Technological Reports (AJSTR)  </td>
                                    <td class="text-center">10</td>
                                    <td class="text-center">อังกฤษ</td>
                                    <td>Vol 25, No 3 (2022)</td>
                                    <td><a href="https://ph02.tci-thaijo.org/index.php/tsujournal" target="_blank">https://ph02.tci-thaijo.org/index.php/tsujournal</a></td>
                                </tr>
                            </table>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
