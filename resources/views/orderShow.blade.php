@extends('layouts.pages')
@section('content')
    @inject('Auth' ,'\Illuminate\Support\Facades\Auth')
    @inject('Helper' ,'\App\Lib\Helper')
    <div class="col-12 col-lg-10 mt-3 ml-6">
       <div class="card col-lg-10">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <tbody>



                    <tr v-for="itemsReserved in itemReserved">
                        <td>@{{ itemsReserved.dates }}</td>
                        <td>@{{ itemsReserved.week }}</td>
                        <td>@{{ itemsReserved.title }}</td>
                        <td>@{{ itemsReserved.location }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" @click="showEditForm( itemsReserved.order_id,itemsReserved.id)">ویرایش مکان رزرو</button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary" @click="deleteLocReserve(itemsReserved.order_id,itemsReserved)">حذف</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <td><h4>مجموع منوی انتخابی</h4></td>
                        <td>تومان </td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    </div>
    <div class="col-12 col-lg-5 mt-3" id="showlocform" >
        <div class="card col-lg-12">
            <div class="card-body">
                <div class="table-responsive" >
                    <table class="table table-bordered" class="col-lg-4">
                        <tbody>
                        <tr>
                            <td>مکان رزرو غذا</td>
                            <td>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <select name="location_id" id="locationslc" v-model="location_id" class="form-control" >
                                            @foreach($locations as $location)
                                                <option name="location_id"  {{$Auth::user()->location_id == $location->id ? 'selected' : ''}} value="{{$location->id}}"> {{\App\Lib\Helper::ParentLocationName($location->parent_id).' ( '.$location->title.' ) ' }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>مکان را انتخاب نموده و روی دکمه کلیک کنید!! </td>

                            <td>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="button" @click="editLocReserve()" class="btn btn-primary">انتخاب مکان رزرو غذا</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
