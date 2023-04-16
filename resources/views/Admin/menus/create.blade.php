@extends('layouts.master')
@section('content')
    <div class="col-12 col-lg-6 mt-3">
        <form method="POST" action="/admin/menucreate">
           <div class="card">
               <div class="card-header">
                <h4 class="card-title">تعریف وعده غذایی </h4>
            </div>
               <div class="card-content">
                   <div class="card-body">
                    <div class="row">
                        <div class="col-12">

                                {{csrf_field()}}
                                <div class="form-group row">
                                    <label for="username" class="col-sm-2 col-form-label">تاریخ وعده غذایی :</label>
                                    <div class="col-sm-10">
                                        <input type="date"  name="date" class="form-control" id="title" placeholder="عنوان غذا ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="meal" class="col-sm-2 col-form-label">وعده غذایی :</label>
                                    <div class="col-sm-10">
                                        <select name="dishes" class="form-control">
                                            <option name="dishes" value="0">ناهار</option>
                                            <option name="dishes" value="1">شام</option>
                                            <option name="dishes" value="2">صبحانه</option>
                                        </select>
                                    </div>
                                </div>


                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div id="accordion2" class="accordion-alt" role="tablist">
                                @foreach($meal as $meals)
                                      <div class="mb-2">
                                         <h6 class="mb-0">
                                        <a class="text-uppercase d-block border collapsed" data-toggle="collapse" href="#collapse{{$meals->id}}" aria-expanded="false" aria-controls="collapse.{{$meals->id}}">
                                            {{$meals->title}}
                                        </a>
                                    </h6>

                                            <div id="collapse{{$meals->id}}" class="collapse" role="tabpanel" data-parent="#accordion2" style="">
                                               <div class="card-body">
                                                   @foreach($food as $foods)
                                                       @if( $meals->id == $foods->meal_id)
                                                           <div class="form-group">
                                                                   <div class="custom-control custom-checkbox custom-control-inline">
                                                                       <input type="checkbox" name='foods[]'  value="{{$foods->id}}" class="custom-control-input" id="{{'food' . $foods->id}}">
                                                                       <label class="custom-control-label" for="{{'food' . $foods->id}}">{{$foods->title}}</label>
                                                                   </div>
                                                           </div>
                                                       @endif
                                                   @endforeach
                                               </div>
                                             </div>

                                      </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">ذخیره نمایید !</button>
                        </div>
                    </div>
                  </div>
               </div>
           </div>
        </form>
    </div>
    <div class="col-12 col-sm-6 mt-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">بردر جدول</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">


                            @foreach($date as $dates)
                                <table class="table table-bordered align-content-center">
                                    <tbody>
                                     <tr>
                                         <td  class="col-lg-12 ">  {{$dates->date}}</td>
                                      </tr>
                                </tbody>
                              </table>


                                <table class="table table-bordered">
                                    <tbody>

                                    @foreach($menu as $menus)
                                        @if($dates->date == $menus->date)
                                        <tr>

                                            <td>{{$menus->date}} </td>
                                            <td>{{$menus->dishes == 0? 'ناهار' : 'شام '}}</td>
                                            <td>{{$menus->food->title}}</td>
                                            <td>
                                                <div class="form-group row">
                                                    <div class="col-sm-10">
                                                        <a  href="{{route('admin.users.edit',$menus->id)}}"  class="btn btn-primary">+</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>

                            @endforeach



                      <table class="table table-bordered">
                        <tbody>
                        {{$i = 1}}

                        @foreach($menu as $menus)
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{$menus->date}} </td>
                                <td>{{$menus->dishes == 0? 'ناهار' : 'شام '}}</td>
                                <td>{{$menus->food->title}}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


</div>
@endsection
