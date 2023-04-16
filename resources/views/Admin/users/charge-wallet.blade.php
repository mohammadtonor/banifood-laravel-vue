@extends('layouts.master')
@section('content')
    <div class="col-6 col-lg-6 mt-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">تعریف کاربر جدید</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form method="POST" action="{{route('admin.users.type')}}" >
                                {{csrf_field()}}

                                <div class="form-group row">
                                    <label for="type" class="col-sm-2 col-form-label">گروه کارمندی'</label>
                                    <div class="col-sm-10">
                                        <select name="type" id="type" class="form-control">
                                            <option value="0" selected="">بومی</option>
                                            <option value="1">غیر بومی</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">ذخیره نمایید !</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-6 mt-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">تعریف کاربر جدید</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form method="POST" action="{{route('admin.users.charger')}}" >
                                {{csrf_field()}}
                                <div class="form-group row">
                                    <label for="type" class="col-sm-2 col-form-label">گروه کارمندی'</label>
                                    <div class="col-sm-10">
                                        <select name="type" id="type" class="form-control">
                                            <option value="0" selected="">بومی</option>
                                            <option value="1">غیر بومی</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="wallet" class="col-sm-2 col-form-label">کیف پول</label>
                                    <div class="col-sm-10">
                                        <input name="wallet" type="number" class="form-control" id="email" placeholder="کیف پول">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">ذخیره نمایید !</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-12 mt-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">ردیف های راه راه</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"> نام </th>
                            <th scope="col">ایمیل </th>
                            <th scope="col">کیف پول </th>
                            <th scope="col">نوع کاربر</th>
                            <th scope="col">گروه کاربر</th>
                            <th scope="col">مکان پیشس فرض</th>
                            <th scope="col">عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{$user->name."   ".$user->family}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{number_format($user->wallet)}}</td>
                                <td>{{$user->isadmin = 0? "کاربر" : "مدیر"}}</td>
                                <td>{{$user->type=1 ? "بومی" : "غیر بومی"}}</td>
                                <td>{{\App\Lib\Helper::ParentLocationName($user->location->parent_id) ."  (". $user->location->title .")"}}</td>
                                <td>

                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <a  href="{{route('admin.users.edit',$user->id)}}"  class="btn btn-primary">ویرایش</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
