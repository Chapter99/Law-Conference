@extends('backend.layouts.default_layout')
@section('title') แก้ไขผู้ทรงคุณวุฒิ @parent @endsection

@section('content')

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header bg-secondary">
            <h3 class="card-title">แก้ไขผู้ทรงคุณวุฒิ</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                    title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('reviewers.update', $reviewer->id) }}" role="form" id="containerForm">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label class="col-sm-2 text-right" for="title">คำนำหน้า <span class="text-danger">*</span></label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                            name="title" value="{{ $reviewer->title }}">
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 text-right" for="fname">ชื่อ <span class="text-danger">*</span></label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control @error('fname') is-invalid @enderror" id="fname"
                            name="fname" value="{{ $reviewer->fname }}">
                        @error('fname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <label class="col-sm-1 text-right" for="lname">สกุล <span class="text-danger">*</span></label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control @error('lname') is-invalid @enderror" id="lname"
                            name="lname" value="{{ $reviewer->lname }}">
                        @error('lname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 text-right" for="type">ประเภท <span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <div class="form-check">
                            <input class="form-check-input @error('type') is-invalid @enderror" type="radio" name="type"
                                id="type1" value="1" @if($reviewer->type == 1) checked @endif >
                            <label class="form-check-label" for="type1">ผู้ทรงคุณวุฒิภายในมหาวิทยาลัยทักษิณ</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input @error('type') is-invalid @enderror" type="radio" name="type"
                                id="type2" value="2" @if($reviewer->type == 2) checked @endif>
                            <label class="form-check-label" for="type2">ผู้ทรงคุณวุฒิภายนอก</label>
                        </div>
                        @error('type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 text-right" for="university">หน่วยงาน <span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control @error('university') is-invalid @enderror" id="university"
                            name="university" value="{{ $reviewer->university }}">
                        @error('university')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 text-right" for="telephone">โทร. <span class="text-danger">*</span></label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control @error('telephone') is-invalid @enderror" id="telephone"
                            name="telephone" value="{{ $reviewer->telephone }}">
                        @error('telephone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 text-right" for="ss1">Session #1 <span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <select class="form-control @error('ss1') is-invalid @enderror" name="ss1">
                            <option value="">--- โปรดระบุ ---</option>
                            @foreach ($topics as $topic)
                            <option value="{{ $topic->id }}" @if($reviewer->ss1 == $topic->id) selected @endif>{{ $topic->id.') '.$topic->name }}</option>
                            @endforeach
                        </select>
                        @error('ss1')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 text-right" for="ss2">Session #2 </label>
                    <div class="col-sm-4">
                        <select class="form-control @error('ss2') is-invalid @enderror" name="ss2">
                            <option value="">--- โปรดระบุ ---</option>
                            @foreach ($topics as $topic)
                            <option value="{{ $topic->id }}" @if($reviewer->ss2 == $topic->id) selected @endif>{{ $topic->id.') '.$topic->name }}</option>
                            @endforeach
                        </select>
                        @error('ss2')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 text-right" for="ss3">Session #3 </label>
                    <div class="col-sm-4">
                        <select class="form-control @error('ss3') is-invalid @enderror" name="ss3">
                            <option value="">--- โปรดระบุ ---</option>
                            @foreach ($topics as $topic)
                            <option value="{{ $topic->id }}" @if($reviewer->ss3 == $topic->id) selected @endif>{{ $topic->id.') '.$topic->name }}</option>
                            @endforeach
                        </select>
                        @error('ss3')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 text-right" for="ss4">Session #4 </label>
                    <div class="col-sm-4">
                        <select class="form-control @error('ss4') is-invalid @enderror" name="ss4">
                            <option value="">--- โปรดระบุ ---</option>
                            @foreach ($topics as $topic)
                            <option value="{{ $topic->id }}" @if($reviewer->ss4 == $topic->id) selected @endif>{{ $topic->id.') '.$topic->name }}</option>
                            @endforeach
                        </select>
                        @error('ss4')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <hr>
                <p class="text-primary">ข้อมูลการ Login</p>
                <div class="form-group row">
                    <label class="col-sm-2 text-right" for="email">E-mail <span class="text-danger">*</span></label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ $reviewer->email }}">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 text-right" for="password">รหัสผ่าน <span class="text-danger">*</span></label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control @error('password') is-invalid @enderror" id="password"
                            name="password" value="{{ $reviewer->password }}">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2"></label>
                    <div class="col-sm-5">
                        <button type="submit" name="Submit" class="btn btn-primary">ปรับปรุงข้อมูลผู้ทรงคุณวุฒิ</button>
                        <a class="btn btn-warning" href="{{ url('backend/reviewers')}}">ยกเลิก</a>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->


</section>
@endsection
