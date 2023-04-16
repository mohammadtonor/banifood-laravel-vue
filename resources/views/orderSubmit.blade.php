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
                    <table class="table table-bordered">
                        <tbody>

                        @foreach($basket->all() as $items)
                            <tr style="padding: 1px ; ">
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
                        </tbody>
                    </table>

                   <table class="table table-bordered col-lg-6">
                       <tbody>
                       <form id="checkout-form" method="Post" action="{{route('order.submit')}}">
                           {{csrf_field()}}
                       <tr>
                           <td><h4>  مجموع منوی انتخابی</h4></td>
                           <td>{{number_format($basket->subtotal())}} تومان </td>


                       </tr>
                       <tr>
                           <td><h5>اعتبار کیف پول شما</h5></td>
                           <td>{{number_format($wallet)}}تومان   </td>
                       </tr>
                       <tr class="col-lg-4">
                           <td> <h5>انتخاب روش پرداخت</h5></td>
                           <td>
                               <div class="form-group col-sm-10">
                                  <select name="methods" class="form-control">
                                      <option name="method" {{$wallet >= $basket->subtotal() ? 'selected' : ''}} value="wallet">پرداخت از کیف پول</option>
                                      <option name="method" {{$wallet < $basket->subtotal() ? 'selected' : ''}} value="online">پرداخت بانکی</option>
                                  </select>
                               </div>
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
                           <td>{{number_format($basket->subtotal())}}  تومان </td>
                       </tr>
                       <tr>
                           <td><a onclick="event.preventDefault();document.getElementById('checkout-form').submit()" class="btn btn-primary d-block w-100">ثبت</a></td>
                           <td>
                               <input type="hidden" name="location_id" value="{{$location}}">
                               <div class="form-group row">
                                   <div class="col-sm-10">
                                       <button type="submit" class="btn btn-primary">تایید نهایی سفارش و پرداخت</button>
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
