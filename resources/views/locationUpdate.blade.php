@extends('layouts.pages')
@section('content')
    <div class="col-12 col-lg-10 mt-3">
        <div class="card col-lg-12">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                        <form action="{{route('order.edit.loc')}} "  method="Post" >
                            {{csrf_field()}}
                            <tr>
                                <td>{{\App\Lib\Helper::week($menu->date)}} </td>
                                <td>{{\App\Lib\Helper::date($menu->date)}} </td>
                                <td>{{$menu->dishes == 0? 'ناهار' : 'شام '}}</td>
                                <td>{{$menu->food->title}}</td>
                                <td>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <select name="location_id" class="form-control">
                                                @foreach($locations as $location)
                                                    <option name="location_id" {{$location->id == $menu->pivot->location_id ? 'selected':''}} value="{{$location->id}}"> {{\App\Lib\Helper::ParentLocationName($location->parent_id).' ( '.$location->title.' ) ' }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </td>
                                <input type="hidden" name="order_id" value="{{$order->id}}">
                                <input type="hidden" name="menu_id" value="{{$menu->id}}">
                                <td colspan="3">
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">تایید مکان</button>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                        </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
