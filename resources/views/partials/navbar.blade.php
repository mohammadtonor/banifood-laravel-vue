@inject('Auth' ,'\Illuminate\Support\Facades\Auth')
<div id="header-fix" class="header fixed-top">
    <nav class="navbar navbar-expand-lg  p-0">
        <div class="navbar-header h4 mb-0 align-self-center d-flex">
            <a href="index.html" class="horizontal-logo align-self-center d-flex d-lg-none">
                <img src="/dist/images/logo.png" alt="logo" width="23" class="img-fluid"> <span class="h5 align-self-center mb-0 ">بانی فود</span>
            </a>
            <a href="#" class="sidebarCollapse mr-2" id="collapse"><i class="icon-menu body-color"></i></a>
        </div>

        <form class="float-left d-none d-lg-block search-form">
            <div class="form-group mb-0 position-relative">
                <input type="text" class="form-control border-0 rounded bg-search pr-5" placeholder="جستجوی همه چیز...">
                <div class="btn-search position-absolute top-0">
                    <a href="#"><i class="h5 icon-magnifier body-color"></i></a>
                </div>
                <a href="#" class="position-absolute close-button mobilesearch d-lg-none" data-toggle="dropdown" aria-expanded="false"><i class="icon-close h5"></i>
                </a>

            </div>
        </form>
        <div class="navbar-right mr-auto">
                    @auth
                        <div class="" style="margin-left: 20px;margin-top: 5px;float: right   ; background-color: #0abb87; height: 30px; color: whitesmoke; padding: 6px; width: 170px;border-radius: 5px;">
                            <span class="font-weight-bold">اعتبار کیف پول :</span>
                            <span>{{\Illuminate\Support\Facades\Auth::user()->wallet}}</span>
                        </div>

                        <a class="btn btn-info  mr-2" href="{{route('order.show')}}">لبست سفارشات</a>
                        <a class="btn btn-info mr-2" href="{{route('basket')}}">ثبت سفارش</a>

                        <a class="btn btn-danger mr-2" href="{{route('auth.logout')}}">@lang('auth.logout')</a>

                    @endauth
        </div>
    </nav>
</div>
