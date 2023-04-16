<nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <a class="navbar-brand" href="#">
        <img src="{{asset('img/logo.png')}}" width="30" height="30" class="d-inline-block align-top" alt="">
        بانی فود
    </a>
    <div class="auth-btn collapse justify-content-end navbar-collapse">
        @guest
            <a class="btn btn-info  mr-2" href="{{route('auth.login.form')}}">@lang('public.login')</a>
            <a class="btn btn-info mr-2" href="">@lang('public.register')</a>
        @endguest
        @auth
           <div class="" style="margin-left: 20px; background-color: #0abb87; height: 30px; color: whitesmoke; padding: 6px; width: 170px;border-radius: 5px;">
               <span class="font-weight-bold">اعتبار کیف پول :</span>
               <span>{{\Illuminate\Support\Facades\Auth::user()->wallet}}</span>
           </div>
                @if( \Illuminate\Support\Facades\Auth::user()->isadmin == 0 )
                    <a class="btn btn-info  mr-2" href="{{route('admin.show.dashboard')}}">پنل کاربری</a>
                @endif
                <a class="btn btn-info  mr-2" href="{{route('order.show')}}">لبست سفارشات</a>
                <a class="btn btn-info mr-2" href="{{route('basket')}}">ثبت سفارش</a>

                <a class="btn btn-danger mr-2" href="{{route('auth.logout')}}">@lang('auth.logout')</a>

        @endauth
    </div>
</nav>
