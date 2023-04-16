@extends('layouts.pages')
@section('content')
    @inject('basket','\App\support\Basket\Basket')
    <div class="col-12 col-lg-10 mt-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">منوی انتخابی شما</h4>
            </div>
            <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>

                            @foreach($basket->all() as $items)
                                <tr>
                                    <td>{{\App\Lib\Helper::week($items->date)}} </td>
                                    <td>{{\App\Lib\Helper::date($items->date)}} </td>
                                    <td>{{$items->food->title}}</td>
                                    <td>1</td>
                                    <td>{{number_format($items->food->price)}}</td>
                                    <td>
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <a  href="{{route('basket.delete',$items->id)}}"  class="btn btn-primary">-</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><h4>مجموع منوی انتخابی</h4></td>
                                <td>{{number_format($basket->subtotal())}} تومان </td>
                            </tr>
                            </tbody>
                        </table>
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td>مکان رزرو غذا</td>
                                <td>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <select name="location_id" class="form-control">

                                                @foreach($locations as $location)
                                                    <option name="location_id"  value="{{$location->id}}"> {{\App\Lib\Helper::ParentLocationName($location->parent_id).' ( '.$location->title.' ) ' }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>مکان را انتخاب نموده و روی دکمه کلیک کنید!! </td>
                                <td><a  href=""  class="btn btn-primary">تایید مکان رزرو غذا</a></td></tr>
                            </tbody>
                        </table>
                    </div>

            </div>
        </div>


    </div>

@endsection
