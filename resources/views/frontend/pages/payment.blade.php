@extends('frontend.layouts.default_layout')
@section('title') Home @parent @endsection

@section('content')
<div class="container mt-5 pt-4">
    <div class="card">
        <div class="card-header bg-pt-purple text-light">อัตราค่าลงทะเบียน (บาท)</div>
        <div class="card-body">
            <table class="table">
                <tr class="bg-secondary">
                    <th class="text-center">Register Type</th>
                    <th class="text-center" style="width:25%">บุคคลทั่วไป/อาจารย์</th>
                    <th class="text-center" style="width:25%">นิสิต-นักศึกษา/นักเรียน</th>
                </tr>
                <tr>
                    <td><b>Standard</b></td>
                    <td class="text-center">1,800</td>
                    <td class="text-center">1,500</td>
                </tr>
            </table>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mt-1 text-pt-orange text-center">การชำระเงิน</h4>
                    <p class="text-center">สามารถชำระเงินโดยการโอนเงินผ่านบัญชีทางธนาคาร</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <table class="table table-hover mb-0">
                        <tr>
                            <th style="width: 35%;">ชื่อบัญชี :</th>
                            <td style="width: 65%;">วิทยาศาสตร์วิจัย ครั้งที่ 13</td>
                        </tr>
                        <tr>
                            <th>หมายเลขบัญชี :</th>
                            <td>020373119294</td>
                        </tr>
                        <tr>
                            <th>ชื่อธนาคาร :</th>
                            <td>ออมสิน</td>
                        </tr>
                        <tr>
                            <th>สาขา :</th>
                            <td>สาขาป่าพะยอม</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-5">
                    <p class="text-secondary"><b>การส่งหลักฐานการชำระเงิน</b></p>
                    <ol>
                        <li>ล๊อกอิน เข้าสู่ระบบ</li>
                        <li>คลิกเมนูแจ้งชำระเงิน</li>
                        <li>กรอกข้อมูลและแนบหลักฐานการชำระเงิน แล้วคลิกแจ้งชำระเงิน</li>
                        <li>รอเจ้าหน้าที่การเงินตรวจสอบยอดเงิน</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
