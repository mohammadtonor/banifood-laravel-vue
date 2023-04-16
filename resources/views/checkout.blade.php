@extends('layouts.pages')
@section('content')
    @inject('basket','\App\support\Basket\Basket')
    @inject('Auth' ,'\Illuminate\Support\Facades\Auth')
    <div class="col-12 col-lg-9 mt-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">منوی انتخابی شما</h4>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered">
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
                </div>
                </div>
            </div>
</div>
    <div class="col-12 col-lg-5 mt-2"  >
          <div class="card">
              <div class="card-body">
                 <form method="Post" action="{{route('order.submit')}}">
                        {{csrf_field()}}
                     <div class="table-responsive" id="LocationForm">
                         <table class="table table-bordered" class="col-lg-4">
                             <tbody>
                             <tr>
                                 <td>مکان رزرو غذا</td>
                                 <td>
                                     <div class="form-group row">
                                         <div class="col-sm-10">
                                             <select name="location_id" id="locationslc" class="form-control" >
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
                                             <button type="button" @click="showPayForm()" class="btn btn-primary">انتخاب مکان رزرو غذا</button>
                                         </div>
                                     </div>
                                 </td>
                             </tr>
                             </tbody>
                         </table>
                     </div>
                     <div class="table-responsive" id="paymethod">
                         <table class="table table-bordered ">
                             <tbody>
                                 {{csrf_field()}}
                                 <tr>
                                     <td>مکان انتخاب شده</td>
                                         <td><b><span id="locationseleced"></span></b></td>
                                 </tr>
                                 <tr class="col-lg-4">

                                     <td>
                                         <div class="custom-control custom-radio col-md-6 custom-control-inline">
                                             <input type="radio" id="wallet" {{$Auth::user()->wallet >= $basket->subtotal() ? 'checked' : ''}} value="wallet" name="methods" class="custom-control-input">
                                             <label class="custom-control-label" for="wallet">
                                                 پرداخت از کیف پول
                                             </label>

                                         </div>
                                     <td> اعتبار کیف پول : {{$Auth::user()->wallet}}</td>
                                 </tr>
                                 <tr class="col-lg-4">

                                     <td>
                                         <div class="custom-control custom-radio col-md-6 custom-control-inline">
                                             <input type="radio" id="online" {{$Auth::user()->wallet < $basket->subtotal() ? 'checked' : ''}} value="online" name="methods" class="custom-control-input">
                                             <label class="custom-control-label" for="online">
                                                 پرداخت آنلاین
                                             </label>
                                         </div>
                                     <td> <h5></h5></td>
                                 </tr>
                                 <tr class="col-lg-4">
                                     <td> <h5>انتخاب درگاه بانکی</h5></td>
                                     <td>
                                         <div class="form-group col-sm-10">
                                             <select name="gateway" class="form-control">
                                                 <option name="gateway" value="saman">سامان</option>
                                                 <option name="gateway" value="pasargad">پاسارگاد</option>
                                             </select>
                                         </div>
                                 </tr>
                                 <tr>
                                     <td><h5>مبلغ قابل پرداخت</h5></td>
                                     <td>{{$Auth::user()->wallet > $basket->subtotal() ? number_format($basket->subtotal()) : number_format($basket->subtotal() - $Auth::user()->wallet) }}  تومان </td>
                                 </tr>
                                 <tr>
                                     <td>
                                         <div class="form-group row">
                                             <div class="col-sm-10">
                                                 <button type="button" @click="showPayForm()" class="btn btn-primary">تغییر مکان رزرو غذا</button>
                                             </div>
                                         </div>
                                     </td>
                                     <td>
                                         <div class="form-group row">
                                             <div class="col-sm-10">
                                                 <button type="submit" class="btn btn-primary">تایید نهایی سفارش و پرداخت</button>
                                             </div>
                                         </div>
                                     </td>
                                 </tr>
                             </tbody>
                         </table>
                     </div>
                 </form>
              </div>
          </div>
     </div>
@endsection
