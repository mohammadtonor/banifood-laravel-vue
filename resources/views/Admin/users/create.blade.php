@extends('layouts.master')

@section('content')
    <div class="col-12 col-lg-6 mt-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">تعریف کاربر جدید</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form method="POST" action="/admin/usercreate" >
                                {{csrf_field()}}
                                <div class="form-group row">
                                    <label for="username" class="col-sm-2 col-form-label">نام :</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" id="username" placeholder="نام">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="username" class="col-sm-2 col-form-label">نام خانوادگی :</label>
                                    <div class="col-sm-10">
                                        <input type="text"  name="family" class="form-control" id="username" placeholder="نام خانوادگی">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">ایمیل</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="ایمیل">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone_number" class="col-sm-2 col-form-label">شماره همراه</label>
                                    <div class="col-sm-10">
                                        <input name="phone_number" type="number" class="form-control" id="phone_number" placeholder="شماره همراه">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="wallet" class="col-sm-2 col-form-label">کیف پول</label>
                                    <div class="col-sm-10">
                                        <input name="wallet" type="number" class="form-control" id="wallet" placeholder="کیف پول">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="isadmin" class="col-sm-2 col-form-label">نوع کاربری</label>
                                    <div class="col-sm-10">
                                         <select  name="isadmin" id="isadmin" class="form-control">
                                        <option value="0">کاربر عادی</option>
                                        <option value="1" >مدیر</option>
                                         </select>
                                    </div>
                                </div>
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
                                    <label for="location" class="col-sm-2 col-form-label">مکان پیش فرض</label>
                                    <div class="col-sm-10">
                                       <select name="location_id" id="location_id" class="form-control">
                                       @foreach($locations as $location)
                                        <option value={{$location->id}} >{{$location->title}}</option>
                                       @endforeach
                                       </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">رمز عبور</label>
                                    <div class="col-sm-10">
                                        <input name="password" type="password" class="form-control" id="inputPassword3" placeholder="رمز عبور">
                                    </div>
                                </div>
                                <div class="offset-sm-3">
                                    @include('partials.validation-errors')
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
@endsection
