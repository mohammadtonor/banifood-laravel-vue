@extends('layouts.master')
@section('content')
    @include('partials.alerts')
    <div class="col-12 col-lg-6 mt-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">تعریف نوع غذا </h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form method="POST" action="/admin/maelcreate">
                                {{csrf_field()}}
                                <div class="form-group row">
                                    <label for="username" class="col-sm-2 col-form-label">وعده اصلی غذایی :</label>
                                    <div class="col-sm-10">
                                        <input type="text"  name="title" class="form-control" id="title" placeholder="وعده اصلی غذایی ">
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
@endsection
