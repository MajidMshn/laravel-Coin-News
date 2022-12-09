@extends('Front.index')
@section('title')
    Coin News
@endsection
@section('content')

    <main class="container-fluid" style="margin-top: 20px">
        <section>
            <div class="container">
                @include('errMsg')
                <div class="main1 shado">
                    <div class="slider">
                        <div class="slider-header">
                            <button class="slider-header-btn" id="pg1" onclick="showHide('page1','page2',this)">انتخاب
                                سردبیر
                            </button>
                            <button class="slider-header-btn" id="pg2" onclick="showHide('page2','page1',this)">اخبار
                                برگزیده
                            </button>
                            <hr style="background-color: #ffdc04;height:4px;width: 100%;font-weight: bold;color: gold">
                        </div>
                        <br>
                        {{--                        انتخاب سردبیر--}}
                        <div class="editor-choise " id="page1">
                            @foreach($articles1 as $a)
                                <div class="kashi"
                                     onmouseover="stoper()"
                                     onmouseleave="starter()"
                                     onmouseenter="showImg('{{$a->image}}','{{$a->name}}','{!! jdate($a->created_at)->ago() !!}')">
                                    <a id="card-art3-a" href="{{route('article.detail',$a->slug)}}" class="kashiLinks">
                                        <p id="{{$a->image}}','{{$a->slug}}">
                                            {{$a->name}}
                                        </p>
                                    </a>
                                </div>
                                <hr>

                            @endforeach

                        </div>
                        {{--برگزیده--}}
                        <div class="hot-stories " id="page2">
                            @foreach($articles2 as $a)
                                {{--                                <p id="{{$a->image}}" hidden></p>--}}
                                {{--                                <p id="{{$a->name}}" hidden></p>--}}
                                {{--                                <p id="{!! jdate($a->created_at)->ago() !!}" hidden></p>--}}

                                <div class="kashi"
                                     onmouseover="stoper()"
                                     onmouseleave="starter()"
                                     onmouseenter="showImg('{{$a->image}}','{{$a->name}}','{!! jdate($a->created_at)->ago() !!}')">
                                    <a id="card-art3-a" href="{{route('article.detail',$a->slug)}}" class="kashiLinks">

                                        <p>

                                            {{$a->name}}
                                        </p>
                                    </a>
                                </div>

                                <hr>
                            @endforeach

                        </div>
                    </div>
                    {{--                    articles-photo-show-by-hover--}}
                    <div class="photos">
                        <div class="photo-title "><h3 id="showTitle"></h3></div>
                        <img src="" id="photo" alt="{{$a->slug}}">
                        <div class="photo-footer" id="photoFooter"></div>
                    </div>
                    {{--                    end- articles-photo- --}}
                </div>

            </div>
        </section>
        {{--        articles 3--}}
        <section>
            <div class="container">
                <div class="main1 shado">
                    <div class="row-div">
                        @foreach($articles3 as $a)
                            <div id="card" class="card ">
                                <img src="{{$a->image}}" alt="">
                                <a href="{{route('article.detail',$a->slug)}}" id="card-art3-a">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <p id="card-art3-p"><b>{{$a->name}}</b></p>
                                        </div>
                                        <div class="card-text">
                                            {{--                                        <p>--}}
                                            {{--                                            this is description for this card div--}}
                                            {{--                                        </p>--}}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>
        </section>
        {{--main-slider-photo--}}
        <section>
            <div class="container ">
                <div class="main1 ">
                    <div class="middle-slider">

                        {{--                        <div class="photo-title "><h3 id="showTitle"></h3></div>--}}
                        <a id="leftBtn" onclick="plus(0)">
                            <ion-icon name="chevron-back-circle-sharp"></ion-icon>
                        </a>
                        <a id="rightBtn" onclick="plus(-2)">
                            <ion-icon name="chevron-forward-circle-sharp"></ion-icon>
                        </a>

                        @foreach($articles4 as $aaa)
                            <div class="imgMain">
                                <img src="{{$aaa->image}}">

                            </div>
                        @endforeach

                        <div class="photo-footer" id="photoFooter">
                            <div id="dots">
                                <div class="dot"></div>
                                <div class="dot"></div>
                                <div class="dot"></div>
                                <div class="dot"></div>
                                <div class="dot"></div>
                                <div class="dot"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        {{--        end-main-slider-photo--}}
        {{--        articles 4--}}
        <section>
            <div class="container">
                <div class="main1 shado">
                    <div class="row-div">
                        @foreach($articles4 as $a)
                            <div id="card" class="card ">
                                <img src="{{$a->image}}" alt="">
                                <a id="card-art3-a" href="{{route('article.detail',$a->slug)}}" target="_blank">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <p><b>{{$a->name}}</b></p>
                                        </div>

                                    </div>
                                </a>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
