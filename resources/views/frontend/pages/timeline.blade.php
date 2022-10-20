@extends('frontend.layouts.default_layout')
@section('title') Home @parent @endsection

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card border-primary">
                <div class="card-body p-2">
                    <div class="page-header">
                        <h4 id="timeline" class="mt-3 text-pt-orange text-center">กำหนดการส่งผลงาน</h4>
                    </div>
                    <ul class="timeline mt-3">
                        <li>
                            <div class="timeline-badge"><i class="fas fa-bullhorn"></i></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">25 ตุลาคม 2565</h4>
                                    {{-- <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11 hours ago via Twitter</small></p> --}}
                                </div>
                                <div class="timeline-body">
                                    <p class="text-pt-blue">เปิดรับลงทะเบียน ส่งผลงาน และชำระเงิน</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-badge warning"><i class="fas fa-file-alt"></i></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">20 ธันวาคม 2565</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-pt-blue">วันสุดท้ายของการลงทะเบียน ส่งผลงาน และชำระเงิน</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-badge info"><i class="fas fa-envelope-open-text"></i></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">10 พฤศจิกายน – 25 ธันวาคม 2565</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-pt-blue">แจ้งผลการพิจารณาบทความ</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-badge light"><i class="fas fa-upload"></i></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">30 ธันวาคม 2565</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-pt-blue">วันสุดท้ายของการแก้ไขบทความฉบับสมบูรณ์</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-badge success"><i class="fas fa-envelope-open-text"></i></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">5 มกราคม 2565</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-pt-blue">ประกาศผลการพิจารณาบทความ</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-badge primary"><i class="fas fa-chalkboard-teacher"></i></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">13 มกราคม 2566</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-pt-blue">วันจัดการประชุมวิชาการ</p>
                                </div>
                            </div>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
