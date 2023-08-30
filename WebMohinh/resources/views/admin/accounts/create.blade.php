@extends('layouts.admin')

@section('content-admin')
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                @if (session('msg'))
                    <h1 class="alert alert-danger">{{ session('msg') }}</h1>
                @endif
                <div class="card-body">
                    <h4 class="card-title">Thêm tài khoản</h4>
                    <form class="forms-sample" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Họ tên</label>
                            <input type="text" class="form-control" id="name" placeholder="Họ tên" name="fullname" value="{{ old('fullname') }}">
                            @error('fullname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{ old('email') }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input type="password" class="form-control" id="password" placeholder="Mật khẩu"
                                name="password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="role">Phân quyền</label>
                            <select name="role_id" id="role" class="form-control">
                                <option value="">Chọn vai trò của nhân viên</option>
                                @foreach ($roleList as $item)
                                    <option value="{{ $item->id }}">{{ $item->name_role }}</option>
                                @endforeach
                            </select>
                            @error('role_id')
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
