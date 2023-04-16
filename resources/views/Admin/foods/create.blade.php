@extends('layouts.master')
@section('content')
    <div class="col-12 col-lg-6 mt-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">تعریف محل رزرو غذا </h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form method="POST" action="/admin/foodcreate">
                                {{csrf_field()}}
                                <div class="form-group row">
                                    <label for="username" class="col-sm-2 col-form-label">عنوان غذا :</label>
                                    <div class="col-sm-10">
                                        <input type="text"  name="title" class="form-control" id="title" placeholder="عنوان غذا ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="meal" class="col-sm-2 col-form-label">نوع غذا</label>
                                    <div class="col-sm-10">
                                        <select name="meal" class="form-control">
                                          <option name="meal" value="0">ناهار</option>
                                          <option name="meal" value="1">شام</option>
                                          <option name="meal" value="2">صبحانه</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="username" class="col-sm-2 col-form-label"> آدرسی تصویر</label>
                                    <div class="col-sm-10">
                                        <input type="text"  name="image" class="form-control" id="title" placeholder="آدرسی تصویر ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">نوع غذا</label>
                                    <div class="col-sm-10">
                                        <select name="meal_id" class="form-control">
                                            @foreach($meal as $meals)
                                                <option name="mealt_id" value="{{$meals->id}}">{{$meals->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="price" class="col-sm-2 col-form-label">قیمت غذا :</label>
                                    <div class="col-sm-10">
                                        <input type="number"  name="price" class="form-control" id="title" placeholder="قیمت فذا ">
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

@endsection
