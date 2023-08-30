@extends('layouts.admin')

@section('content-admin')
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                @if (session('msg'))
                    <h1 class="alert alert-success">{{ session('msg') }}</h1>
                @endif
                <div class="card-body">
                    <h4 class="card-title">Danh sách nhân viên</h4>
                    <div class="form-filter">
                        <form method="get">
                            <div class="row">
                                <div class="form-group col-lg-2">
                                    <label for="role">Quền</label>
                                    <select name="role_id" id="role" class="form-control">
                                        <option value="1" {{ request('role_id') == 1 ? 'selected' : ''}}>Admin</option>
                                        <option value="2" {{ request('role_id') == 2 ? 'selected' : ''}}>Thường</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-8">
                                    <label for="name">Nhập tên nhân viên</label>
                                    <input type="text" name="fullname" id="name" class="form-control" value="{{ request('fullname') }}">
                                </div>
                                <div class="form-group col-lg-2">
                                    <br>
                                    <button type="submit" class="btn btn-success">Tìm kiếm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Quyền</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($accountList as $item)
                                <tr>
                                    <td>{{ $item->fullname }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td class="text-info">{{ $item->name_role }}</td>
                                    <td>
                                        <a href="#" 
                                        onclick="if(confirm('Xác nhận xóa?') == true){ location.href = '/admin/tai-khoan/xoa-tai-khoan/{{ $item->id }}' }"
                                            class="btn btn-inverse-danger btn-rounded btn-icon"><i
                                                class="mdi mdi-delete-forever" title="Xóa"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
