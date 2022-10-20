@extends('frontend.layouts.default_layout')
@section('title') Home @parent @endsection

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card border-primary">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="mt-1 text-pt-orange text-center">รายชื่อผู้ลงทะเบียน</h4>
                        </div>
                    </div>
                    @if(count($users))
                    <table class="table table-hover">
                        <tr class="bg-light">
                            <th class="text-center text-pt-blue">ลำดับ</th>
                            <th class="text-pt-blue">ชื่อ-สกุล</th>
                            <th class="text-pt-blue">หน่วยงาน</th>
                        </tr>
                        @foreach ($users as $user)
                            <tr>
                                <td  class="text-center">{{ $loop->index +1 }}</td>
                            <td>@if($user->academic != ""){{ $user->academic }}@else{{ $user->title }}@endif{{ $user->fname.' '.$user->lname }}</td>
                                <td>@if($user->university != ""){{ $user->university }} @else {{ $user->org }} @endif</td>
                            </tr>
                        @endforeach
                    </table>
                    @else
                    <p class="text-center">-- ยังไม่มีผู้ลงทะเบียน --</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
