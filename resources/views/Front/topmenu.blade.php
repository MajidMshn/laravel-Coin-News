<div class="intro">
    <div class="topmenu">
        <div id="nav" class="nav">
            {{--nav menu--}}
            <div class="header-icon">
                <img src="/build/images/icon.png" alt="">
            </div>
            <div class="headerTitle">
                <span class="header-title"> Coin News</span>
            </div>
            <section>
                <nav>
                   <table>
                       <tr>
                           <td>
                               <span class="menuButton">    <a href="{{route('Front.index')}}"> <ion-icon name="home" ></ion-icon></a></span>

                           </td>
                           <td>
                               <span style="margin-top: 10px;margin-right: 10px" class="menuButton" onclick="showSidebar()"> <ion-icon name="menu" ></ion-icon></span>

                           </td>
                       </tr>
                   </table>


                </nav>
            </section>
{{--            slider right menu--}}
{{--            <div class="prices">--}}
{{--            <h3>this is price</h3>--}}
{{--            </div>--}}
            <div class="slider-menu-right" id="slider-navbar">
               <ul>
                   <span class="close-btn" onclick="showSidebar()"><ion-icon name="exit-outline"></ion-icon></span>
                   <li><a href="{{route('Front.index')}}">خانه</a></li>
                   <li><a href="#">درباره ما</a></li>
                   <li><a href="#">مطالب</a></li>
                   <li class="profile-li"><a href="#">پنل کاربری</a>
                   <ul class="profile-ul">

                       @auth
                           @if(auth()->user()->roll ==0)
                               <li><a href="{{route('profile.show',auth()->user()->id)}}">پروفایل</a></li>
                               <form method="post" action="{{route('logout')}}" id="logoutFrm">
                                   @csrf
                                   <li><a onclick="subFrm('logoutFrm')" >خروج</a></li>
                               </form>
                           @else
                               <li><a href="{{route('profile.show',auth()->user()->id)}}">پروفایل</a></li>
                                <li ><a href="{{route('admin.index')}}" target="_blank">پنل مدیریت</a></li>
                               <form method="post" action="{{route('logout')}}" id="logoutFrm">
                                   @csrf
                                   <li><a onclick="subFrm('logoutFrm')">خروج</a></li>
                               </form>
                           @endif
                       @else
                           <li><a href="{{route('register')}}">ثبت نام</a></li>
                           <li><a href="{{route('login')}}">ورود</a></li>
                       @endauth
                   </ul>
                   </li>

               </ul>

{{--                <a href="{{route('Front.index')}}">خانه</a>--}}
{{--                <a href="#">درباره ما</a>--}}
{{--                <a href="#">مطالب</a>--}}
{{--                <div class="dropDown">--}}
{{--                    <a href="#">پنل کاربری</a>--}}
{{--                    <div class="drop-content shado">--}}
{{--                        @auth--}}
{{--                            @if(auth()->user()->roll ==0)--}}
{{--                                <form method="post" action="{{route('logout')}}" id="logoutFrm">--}}
{{--                                    @csrf--}}
{{--                                    <a onclick="subFrm('logoutFrm')" >خروج</a>--}}
{{--                                </form>--}}
{{--                                <a href="#">پروفایل</a>--}}
{{--                            @else--}}
{{--                                <a href="{{route('admin.index')}}" target="_blank">پنل مدیریت</a>--}}
{{--                                <form method="post" action="{{route('logout')}}" id="logoutFrm">--}}
{{--                                    @csrf--}}
{{--                                    <a onclick="subFrm('logoutFrm')">خروج</a>--}}
{{--                                </form>--}}
{{--                            @endif--}}
{{--                        @else--}}
{{--                            <a href="{{route('register')}}">ثبت نام</a>--}}
{{--                            <a href="{{route('login')}}">ورود</a>--}}
{{--                        @endauth--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
{{--        crypto currency prices update every 5 minutes--}}
        <div class="prices">
            <div class="priceItem" id="BTC"></div>
            <div class="priceItem" id="ETH"></div>
            <div class="priceItem" id="BNB"></div>

            <div class="priceItem" id="XRP"></div>
            <div class="priceItem" id="BCH"></div>
            <div class="priceItem" id="XMR"></div>
            <div class="priceItem" id="ZEC"></div>
            <div class="priceItem" id="NEO"></div>
        </div>
    </div>
</div>
