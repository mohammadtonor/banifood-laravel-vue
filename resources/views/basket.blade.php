@extends('layouts.pages')

@section('content')
@inject('basket','App\support\Basket\Basket')
    <div class="col-12 col-md-6 mt-3">
         <div class="card">
        <div class="card-body">
            <div class="wizard-tab mb-4">
                <ul class="nav nav-tabs d-block d-sm-flex p-0">
                    <li class="nav-item ml-auto mb-4">
                        <a class="nav-link p-0 " data-toggle="tab" href="#tab1">
                            <div class="d-flex">
                                <div class="ml-3 mb-0 h1">صبحانه</div>
                                <div class="media-body align-self-center">
                                    <h6 class="mb-0 text-uppercase font-weight-bold"></h6>
                                </div>
                            </div>

                        </a>
                    </li>
                    <li class="nav-item ml-auto mb-4">
                        <a class="nav-link active p-0" data-toggle="tab" href="#tab2">
                            <div class="d-flex">
                                <div class="ml-3 mb-0 h1">ناهار</div>
                                <div class="media-body align-self-center">
                                    <h6 class="mb-0 text-uppercase font-weight-bold"> </h6>

                                </div>
                            </div>
                        </a>
                    </li>

                    <li class="nav-item mb-4">
                        <a class="nav-link p-0" data-toggle="tab" href="#tab3">
                            <div class="d-flex">
                                <div class="ml-3 h1 mb-0">شام</div>
                                <div class="media-body align-self-center">
                                    <h6 class="mb-0 text-uppercase font-weight-bold">منو</h6>
                                   منوی
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade " id="tab1">

                </div>
                <div class="tab-pane fade active show" id="tab2">
                    <div class="table-responsive col-lg-12">


                        @foreach($date as $dates)
                            <table class="table table-bordered align-content-center">
                                <tbody>
                                <tr id="date">
                                    <td  class="col-lg-12 ">  <span>{{ \App\Lib\Helper::date($dates->date)}}  </span><span>{{\App\Lib\Helper::week($dates->date)}}</span></td>
                                </tr>
                                </tbody>
                            </table>

                            <table class="table table-striped col-lg-12">
                                <tbody>
                                    <tr>
                                @foreach($menu as $menus)
                                    @if($dates->date == $menus->date && $menus->dishes == 0)
                                        <tr>
                                            @if( \App\Lib\Helper::mergeMealTdd($menus->id) == 0)
                                                <td>{{$menus->meal_id}}</td>
                                            @elseif(\App\Lib\Helper::mergeMealTdd($menus->id) == 1)
                                                <td rowspan="2">{{$menus->meal_id}}</td>
                                            @endif
                                            <td>{{$menus->dishes == 0? 'ناهار' : 'شام '}}</td>
                                            <td>{{$menus->food->title}}</td>
                                            <td>{{number_format($menus->food->price)}}</td>
                                            <td>
                                                <div class="form-group row">
                                                    <div class="col-sm-10">
                                                        <button type="button" @click="checkItemBasket({{$menus->id}})"  class="btn btn-primary">+</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        @endif
                                        @endforeach
                                        </tr>
                                </tbody>
                            </table>

                        @endforeach





                    </div>
                </div>
                <div class="tab-pane fade" id="tab3">
                    <div class="table-responsive col-lg-12">


                        @foreach($date as $dates)
                            <table class="table  table-striped align-content-center">
                                <tbody>
                                <tr>
                                    <td  class="col-lg-12 ">  {{\App\Lib\Helper::date($dates->date)}}</td>
                                </tr>
                                </tbody>
                            </table>

                            <table class="table table-bordered col-lg-12">
                                <tbody>
                                <tr>

                                @foreach($menu as $menus)
                                    @if($dates->date == $menus->date && $menus->dishes == 1)
                                        <tr>
                                            <td ><span>{{ \App\Lib\Helper::date($dates->date)}}</span></td>
                                            <td>{{$menus->dishes == 0? 'ناهار' : 'شام '}}</td>
                                            <td>{{$menus->food->title}}</td>
                                            <td>{{number_format($menus->food->price)}}</td>
                                            <td>
                                                <div class="form-group row">
                                                    <div class="col-sm-10">
                                                        <button type="button" @click="checkItemBasket({{$menus->id}})"  class="btn btn-primary">+</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                        </tr>
                                </tbody>
                            </table>

                        @endforeach





                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="col-12 col-sm-6 mt-3">
        <div class="card" >
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">منوی انتخابی شما</h4>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-striped">
                            <tbody>
                                    <tr v-for="basketItem in basketItems">
                                        <td>@{{ basketItem.week }} </td>
                                        <td>@{{ basketItem.dates }} </td>
                                        <td>@{{ basketItem.title }}</td>
                                        <td>@{{ basketItem.price }}</td>
                                        <td>
                                            <div class="form-group row">
                                                <div class="col-sm-10">
                                                        {{csrf_field()}}
                                                        <button type="button" v-on:click="deleteFromBasket(basketItem.id)" class="btn sweet-14 btn-primary">-</button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td><h4>مجموع منوی انتخابی</h4></td>
                                <td><span>@{{ subTotalBasket }}</span> تومان </td>
                                <td><a  href="{{route('basket.checkout.form')}}"  class="btn btn-primary">تایید و انتخاب مکان</a></td>
                            </tr>
                            </tbody>
                        </table>
                 </div>

            </div>
        </div>


    </div>

@endsection
