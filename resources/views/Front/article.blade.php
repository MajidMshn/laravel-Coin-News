@extends('Front.index')
@section('title')
    جزییات خبر
@endsection
@section('content')

    <main class="container-fluid">

        <section>

            <div class="container">
                {{--                response comment--}}

                {{--                end response comment--}}
                <div class="main1 shado">

                    <div class="card">

                        @include('errMsg')
                        <div class="row">
                            <div class="col-3" id="col3" style="padding-top: 90px;text-align: center;">
                                <h4 style="text-shadow: 1px 1px 8px purple;margin-bottom: 40px;"><b>جدیدترین اخبار</b>
                                </h4>
                                <ul>
                                    @foreach($articles11 as $a1)
                                        <li>
                                            <a href="{{route('article.detail',$a1->slug)}}"
                                               title="{{$a1->slug}}">{{$a1->name}}</a>
                                        </li>
                                    @endforeach
                                </ul>

                            </div>
                            <div class="col-9" id="col9">

                                <div class="card-title m-3">
                                    @foreach($article->categories()->pluck('name') as $cat)
                                        <span class="badge bg-success">
                                                            {{$cat }}
                                                        </span>

                                    @endforeach

                                </div>

                                نویسنده: {{$nasher->name}}
                                <div style="width: 100px;height: 100px;position: absolute;left: 20px;top:0;">
                                    {{--                                    <img src="{{asset('/storage/profile/'.auth::user($article->user_id)->name.'.jpg')}}" alt="users">--}}
                                </div>
                                <hr>
                                <div class="card-body   ">

                                    {!! $article->description !!}
                                </div>
                                <span
                                    style="margin-right: 40px">{!! jdate($article->created_at)->format('%A-%d-%b-%Y') !!}</span>
                                <hr class="bg-danger">

            <?php

                                echo $article->keywords;
            ?>
                                <hr>


                                <section id="sec">
                                    @include('Front.comment')<br><br>
                                  @include('Front.showComment',['comments'=>$article->comments])

                                </section>


                            </div>




                        </div>
                    </div>

                </div>
            </div>
        </section>


    </main>
@endsection
