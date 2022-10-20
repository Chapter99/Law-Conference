@extends('backend.layouts.default_layout')
@section('title') หน้าหลัก @parent @endsection

@section('content')

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header bg-secondary">
      <h3 class="card-title">ภาพรวม</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          จำนวนผู้นำเสนอผลงานที่ส่งผลงานแล้ว : จำนวนผู้ลงทะเบียนทั้งหมด ({{ $data['num_hasPaper'] }} : {{ $data['num_all'] }})
          <div class="progress">
            <div class="progress-bar progress-bar-striped" role="progressbar"
              style="width: {{ $data['num_hasPaper']/$data['num_all']*100 }}%"
              aria-valuenow="{{$data['num_hasPaper']/$data['num_all']*100 }}" aria-valuemin="0" aria-valuemax="100">
              {{ $data['num_hasPaper']/$data['num_all']*100 }}%</div>
          </div>
          {{-- จำนวนผู้นำเสนอผลงานที่ส่งผลงานแล้ว : จำนวนผู้นำเสนอผลงาน ({{ $data['num_hasPaper'] }} :
          {{ $data['num_present'] }})
          <div class="progress">
            <div class="progress-bar progress-bar-striped" role="progressbar"
              style="width: {{ $data['num_hasPaper']/$data['num_present']*100 }}%"
              aria-valuenow="{{ $data['num_hasPaper']/$data['num_present']*100 }}" aria-valuemin="0"
              aria-valuemax="100">{{ $data['num_hasPaper']/$data['num_present']*100 }}%</div>
          </div> --}}
          {{-- จำนวนผู้นำเสนอผลงานภายในมหาวิทยาลัย :  จำนวนผู้นำเสนอผลงานทั้งหมด ({{ $data['num_tsu'] }} :
          {{ $data['num_other']+$data['num_tsu'] }})
          <div class="progress">
            <div class="progress-bar progress-bar-striped" role="progressbar"
              style="width: {{ ($data['num_tsu']/($data['num_other']+$data['num_tsu']))*100 }}%"
              aria-valuenow="{{ ($data['num_tsu']/($data['num_other']+$data['num_tsu']))*100 }}" aria-valuemin="0"
              aria-valuemax="100">{{ ($data['num_tsu']/($data['num_other']+$data['num_tsu']))*100 }}%</div>
          </div> --}}
        </div>
      </div>
      {{-- <hr>
      <h5 class="text-primary">สรุปจำนวนผลงานแต่ละเซสชั่น</h5>
      <table class="table table-hover">
        <tr class="bg-secondary">
          <th rowspan="2" class="text-center">เซสชั่น</th>
          <th colspan="2" class="text-center">ตีพิมพ์ Abstract</th>
          <th colspan="2" class="text-center">ตีพิมพ์ Proceeding</th>
          <th colspan="2" class="text-center">ตีพิมพ์ Journal</th>
          <th rowspan="2" class="text-center">รวม</th>
        </tr>
        <tr class="bg-secondary">
          <th class="text-center">Oral</th>
          <th class="text-center">Poster</th>
          <th class="text-center">Oral</th>
          <th class="text-center">Poster</th>
          <th class="text-center">Oral</th>
          <th class="text-center">Poster</th>
        </tr>
        @foreach ($stats as $key => $stat)
          @if($key == 12)
            <tr class="bg-light">
              <td class="text-center">รวม</td>
              <td class="text-center">{{ $stat['abs_oral'] }}</td>
              <td class="text-center">{{ $stat['abs_poster'] }}</td>
              <td class="text-center">{{ $stat['full_oral'] }}</td>
              <td class="text-center">{{ $stat['full_poster'] }}</td>
              <td class="text-center">{{ $stat['jnl_oral'] }}</td>
              <td class="text-center">{{ $stat['jnl_poster'] }}</td>
              <td class="text-center">{{ $stat['sum']  }}</td>
            </tr>
          @else
            <tr>
              <td>{{ $key.') '.$stat['topic'] }}</td>
              <td class="text-center">{{ $stat['abs_oral'] }}</td>
              <td class="text-center">{{ $stat['abs_poster'] }}</td>
              <td class="text-center">{{ $stat['full_oral'] }}</td>
              <td class="text-center">{{ $stat['full_poster'] }}</td>
              <td class="text-center">{{ $stat['jnl_oral'] }}</td>
              <td class="text-center">{{ $stat['jnl_poster'] }}</td>
              <td class="text-center">{{ $stat['sum']  }}</td>
            </tr>
          @endif
        @endforeach
      </table> --}}
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->


</section>
@endsection