@extends('frontend.layouts.default_layout')
@section('title') Home @parent @endsection

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card border-primary">
                <div class="card-body p-4">
                    <div class="row pt-4">
                        <div class="col-md-12">
                            <h5 class="text-primary">รายชื่อโรงแรม</h5>
                            <table class="table">
                                <tr class="bg-light">
                                    <th class="text-center">ชื่อโรงแรม</th>
                                    <th class="text-center">เว็บไซต์</th>
                                    <th class="text-center">จำนวนห้อง</th>
                                </tr>
                                <tr>
                                    <td>Merdelong Hotel</td>
                                    <td class="text-center"><a href="https://www.facebook.com/Merdelong-Hotel-%E0%B9%82%E0%B8%A3%E0%B8%87%E0%B9%81%E0%B8%A3%E0%B8%A1%E0%B9%80%E0%B8%A1%E0%B8%AD%E0%B8%A3%E0%B9%8C%E0%B9%80%E0%B8%94%E0%B8%AD%E0%B8%A5%E0%B8%AD%E0%B8%87-418258261659447/" target="_blank"> Facebook Page</a></td>
                                    <td class="text-center">20 ห้อง</td>
                                </tr>
                                <tr>
                                    <td>The Centris Hotel Phatthalung</td>
                                    <td class="text-center"><a href="http://www.thecentrishotelphatthalung.com" target="_blank">Website</a> <a href="https://www.facebook.com/thecentrishotelphatthalung/" target="_blank"> Facebook Page</a></td>
                                    <td class="text-center">55 ห้อง</td>
                                </tr>
                                <tr>
                                    <td>Nora Vill</td>
                                    <td class="text-center"><a href="https://www.facebook.com/noravill.ptl/" target="_blank"> Facebook Page</a></td>
                                    <td class="text-center">33 ห้อง</td>
                                </tr>
                                <tr>
                                    <td>โรงแรมซิตี้ ปาร์ค</td>
                                    <td class="text-center"><a href="https://www.facebook.com/cityparkhotelphatthalung/" target="_blank"> Facebook Page</a></td>
                                    <td class="text-center">40 ห้อง</td>
                                </tr>
                                <tr>
                                    <td>โรงแรมชัยคณา ธานี</td>
                                    <td class="text-center"><a href="https://www.facebook.com/Chaikanathanihotel/?locale2=th_TH" target="_blank"> Facebook Page</a></td>
                                    <td class="text-center">78 ห้อง</td>
                                </tr>
                                <tr>
                                    <td>โรงแรมสิทธินาถ แกรนด์วิว</td>
                                    <td class="text-center"><a href="https://www.facebook.com/sitthinardgrandview/" target="_blank"> Facebook Page</a></td>
                                    <td class="text-center">52 ห้อง</td>
                                </tr>
                                <tr>
                                    <td>โรงแรมศิวา รอยัล พัทลุง</td>
                                    <td class="text-center"><a href="https://www.facebook.com/sivaroyalhotelphatthalung/" target="_blank"> Facebook Page</a></td>
                                    <td class="text-center">68 ห้อง</td>
                                </tr>
                                <tr>
                                    <td>โรงแรมร้อยทอง</td>
                                    <td class="text-center"><a href="https://www.facebook.com/roithongresort/" target="_blank"> Facebook Page</a></td>
                                    <td class="text-center">29 ห้อง</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection