<div class="sidebar">
    <a href="#" class="sidebarCollapse float-right h6 dropdown-menu-right mr-2 mt-2 position-absolute d-block d-lg-none">
        <i class="icon-close"></i>
    </a>
    <!-- START: Logo-->
    <a href="index.html" class="sidebar-logo d-flex">
        <img src="/dist/images/logo.png" alt="logo" width="25" class="img-fluid ml-2">
        <span class="h5 align-self-center mb-0">پولو</span>
    </a>
    <!-- END: Logo-->

    <!-- START: Menu-->
    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 640px;"><ul id="side-menu" class="sidebar-menu" style="overflow: hidden; width: auto; height: 640px;">
            <li class="dropdown active"><a href="href="{{route('admin.users.show')}}"><i class="icon-speedometer"></i>کاربران</a>
                <div>
                    <ul>
                        <li class="active"><a href="{{route('admin.users.create')}}"><i class="icon-rocket"></i> ایجاد کابر</a></li>
                        <li><a href="{{route('admin.users.show')}}"><i class="icon-shuffle"></i> لیست کاربران</a></li>
                        <li><a href="{{route('admin.users.wallet')}}"><i class="icon-shuffle"></i> شارژ کیف پول</a></li>

                    </ul>
                </div>
            </li>
            <li class="dropdown"><a href="{{route('admin.location.create')}}"><i class="icon-support"></i>مکان رزرو غذا</a>
                <div>
                    <ul>
                        <li><a href="{{route('admin.location.create')}}"><i class="icon-calendar"></i> ایجاد مکان</a></li>

                    </ul>
                </div>
            </li>
            <li class="dropdown"><a href="{{route('admin.meal.create')}}"><i class="icon-chart"></i>وعده غذایی</a>
                <div>
                    <ul>
                        <li class="dropdown"><a href="{{route('admin.meal.create')}}" class="d-flex align-items-center"><i class="icon-chart"></i> ایجاد وعده غذایی </a>
                    </ul>
                </div>
            </li>
            <li class="dropdown"><a href="{{route('admin.food.create')}}"><i class="icon-envelope"></i>غذای اصلی</a>
                <div>
                    <ul>
                        <li><a href="{{route('admin.food.create')}}"><i class="icon-envelope"></i> تعریف غذا </a></li>

                    </ul>
                </div>

            </li>

            <li class="dropdown"><a href="{{route('admin.location.create')}}"><i class="icon-film"></i>منو غذایی</a>
                <div>
                    <ul>
                        <li><a href="{{route('admin.menu.create')}}"><i class="icon-disc"></i> تعریف منو</a></li>

                    </ul>
                </div>

            </li>



        </ul><div class="slimScrollBar" style="background: rgb(255, 255, 255); width: 5px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 0px; height: 282.678px;"></div><div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 0px;"></div></div>
    <!-- END: Menu-->
</div>
