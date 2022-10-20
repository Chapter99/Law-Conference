@extends('frontend.layouts.default_layout')
@section('title') Home @parent @endsection

@section('content')
<div class="container mt-5 pt-4">
    <div class="card border-primary">
        <div class="card-body p-4">
            <h4 class="mt-3 text-pt-orange text-center">ดาวน์โหลดเกียรติบัตร</h4>
            <table class="table table-bordered">
                <tr>
                    <th class="text-center">Session</th>
                    <th class="text-center">ภาคบรรยาย</th>
                    <th class="text-center">ภาคโปสเตอร์</th>
                </tr>
                <tr>
                    <td>Session 1  นวัตกรรมและผลงานสร้างสรรค์ </td>
                    <td class="text-center"><a href="{{ asset('downloads/cer/Oral_Cer_01.pdf') }}" target="_blank"><img src="{{ asset('assets/images/download.png') }}"> ดาวน์โหลด</a></td>
                    <td class="text-center"><a href="{{ asset('downloads/cer/Poster_Cer_01.pdf') }}" target="_blank"><img src="{{ asset('assets/images/download.png') }}"> ดาวน์โหลด</a></td>
                </tr>
                <tr>
                    <td>Session 2  วิทยาศาสตร์ชีวภาพและเกษตรศาสตร์ </td>
                    <td class="text-center"><a href="{{ asset('downloads/cer/Oral_Cer_02.pdf') }}" target="_blank"><img src="{{ asset('assets/images/download.png') }}"> ดาวน์โหลด</a></td>
                    <td class="text-center"><a href="{{ asset('downloads/cer/Poster_Cer_02.pdf') }}" target="_blank"><img src="{{ asset('assets/images/download.png') }}"> ดาวน์โหลด</a></td>
                </tr>
                <tr>
                    <td>Session 3  วิทยาศาสตร์เคมีและเภสัช </td>
                    <td class="text-center"><a href="{{ asset('downloads/cer/Oral_Cer_03.pdf') }}" target="_blank"><img src="{{ asset('assets/images/download.png') }}"> ดาวน์โหลด</a></td>
                    <td class="text-center"><a href="{{ asset('downloads/cer/Poster_Cer_03.pdf') }}" target="_blank"><img src="{{ asset('assets/images/download.png') }}"> ดาวน์โหลด</a></td>
                </tr>
                <tr>
                    <td>Session 4  ฟิสิกส์ศึกษา ฟิสิกส์ประยุกต์และวิศวกรรมศาสตร์ </td>
                    <td class="text-center"><a href="{{ asset('downloads/cer/Oral_Cer_04.pdf') }}" target="_blank"><img src="{{ asset('assets/images/download.png') }}"> ดาวน์โหลด</a></td>
                    <td class="text-center"><a href="{{ asset('downloads/cer/Poster_Cer_04.pdf') }}" target="_blank"><img src="{{ asset('assets/images/download.png') }}"> ดาวน์โหลด</a></td>
                </tr>
                <tr>
                    <td>Session 5  คณิตศาสตร์และคอมพิวเตอร์ </td>
                    <td class="text-center"><a href="{{ asset('downloads/cer/Oral_Cer_05.pdf') }}" target="_blank"><img src="{{ asset('assets/images/download.png') }}"> ดาวน์โหลด</a></td>
                    <td class="text-center"><a href="{{ asset('downloads/cer/Poster_Cer_05.pdf') }}" target="_blank"><img src="{{ asset('assets/images/download.png') }}"> ดาวน์โหลด</a></td>
                </tr>
                <tr>
                    <td>Session 6  วิทยาศาสตร์สุขภาพ </td>
                    <td class="text-center"><a href="{{ asset('downloads/cer/Oral_Cer_06.pdf') }}" target="_blank"><img src="{{ asset('assets/images/download.png') }}"> ดาวน์โหลด</a></td>
                    <td class="text-center"><a href="{{ asset('downloads/cer/Poster_Cer_06.pdf') }}" target="_blank"><img src="{{ asset('assets/images/download.png') }}"> ดาวน์โหลด</a></td>
                </tr>
                <tr>
                    <td>Session 7 การศึกษา </td>
                    <td class="text-center"><a href="{{ asset('downloads/cer/Oral_Cer_07.pdf') }}" target="_blank"><img src="{{ asset('assets/images/download.png') }}"> ดาวน์โหลด</a></td>
                    <td class="text-center"><a href="{{ asset('downloads/cer/Poster_Cer_07.pdf') }}" target="_blank"><img src="{{ asset('assets/images/download.png') }}"> ดาวน์โหลด</a></td>
                </tr>
                <tr>
                    <td>Session 8 มนุษยศาสตร์ </td>
                    <td class="text-center"><a href="{{ asset('downloads/cer/Oral_Cer_08.pdf') }}" target="_blank"><img src="{{ asset('assets/images/download.png') }}"> ดาวน์โหลด</a></td>
                    <td class="text-center"><a href="{{ asset('downloads/cer/Poster_Cer_08.pdf') }}" target="_blank"><img src="{{ asset('assets/images/download.png') }}"> ดาวน์โหลด</a></td>
                </tr>
                <tr>
                    <td>Session 9 สังคมศาสตร์ </td>
                    <td class="text-center"><a href="{{ asset('downloads/cer/Oral_Cer_09.pdf') }}" target="_blank"><img src="{{ asset('assets/images/download.png') }}"> ดาวน์โหลด</a></td>
                    <td class="text-center"><a href="{{ asset('downloads/cer/Poster_Cer_09.pdf') }}" target="_blank"><img src="{{ asset('assets/images/download.png') }}"> ดาวน์โหลด</a></td>
                </tr>
                <tr>
                    <td>Session 10 บริหารธุรกิจและเศรษฐศาสตร์ </td>
                    <td class="text-center"><a href="{{ asset('downloads/cer/Oral_Cer_10.pdf') }}" target="_blank"><img src="{{ asset('assets/images/download.png') }}"> ดาวน์โหลด</a></td>
                    <td class="text-center"><a href="{{ asset('downloads/cer/Poster_Cer_10.pdf') }}" target="_blank"><img src="{{ asset('assets/images/download.png') }}"> ดาวน์โหลด</a></td>
                </tr>
                <tr>
                    <td>Session 11 นวัตกรรมสังคม </td>
                    <td class="text-center"><a href="{{ asset('downloads/cer/Oral_Cer_11.pdf') }}" target="_blank"><img src="{{ asset('assets/images/download.png') }}"> ดาวน์โหลด</a></td>
                    <td class="text-center">-</td>
                </tr>
            </table> 
        </div>
    </div>
</div>

@endsection
