@extends('layouts.master')
@section('content')
    @include('partials.alerts')
    <div class="col-12 col-lg-6 mt-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">تعریف محل رزرو غذا </h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form method="POST" action="/admin/locationcreate">
                                {{csrf_field()}}
                                <div class="form-group row">
                                    <label for="username" class="col-sm-2 col-form-label">مکان اصلی :</label>
                                    <div class="col-sm-10">
                                        <input type="text"  name="title" v-model="locationName" class="form-control" id="title" placeholder="مکان اصلی ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">ستاد مربوطه</label>
                                    <div class="col-sm-10">
                                        <select name="parent_id" v-model="parent_id" class="form-control">
                                            <option selected="" value="0">ستاد اصلی</option>
                                            <option  v-for="location in locations" :value="location.id">@{{location.title}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="button" v-on:click="addLocation" class="btn btn-primary">ذخیره نمایید !</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 mt-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">بردر جدول</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">مکان اصلی </th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="location in locations">
                            <th scope="row">@{{location.title}}</th>
                            <td>@{{location.parent_id}} </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
