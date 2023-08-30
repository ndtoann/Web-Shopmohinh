@extends('layouts.admin')

@section('content-admin')
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                @if (session('msg'))
                    <h1 class="alert alert-danger">{{ session('msg') }}</h1>
                @endif
                <div class="card-body">
                    <h4 class="card-title">Đổi mật khẩu</h4>
                    <form class="forms-sample" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email"
                                value="{{ old('email') }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_old">Mật khẩu cũ</label>
                            <input type="password" class="form-control" id="password_old" placeholder="Mật khẩu"
                                name="password_old" value="{{ old('password_old') }}">
                            @error('password_old')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_new">Mật khẩu mới</label>
                            <input type="password" class="form-control" id="password_new" placeholder="Mật khẩu"
                                name="password_new" value="{{ old('password_new') }}">
                            @error('password_new')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <a class="btn btn-light" href="/admin/tai-khoan">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
