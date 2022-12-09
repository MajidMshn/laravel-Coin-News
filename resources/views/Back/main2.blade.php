@extends('Back.index2')
@section('title')
    پنل مدیریت
@endsection
@section('content')
    <div class="main-panel p-3">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center g-2 ">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="row">
                            <div class="col">
                                <div class="card-body">
                                    <h4 class="card-title"><p>{!! jdate(now())->format('%A  %d  %b %Y') !!}</p></h4>
{{--                                    ********************************************************--}}
                                  <div style="display: grid;place-content: center">
                                      <canvas id="myChart" style="width:60%;max-width:600px"></canvas>


                                  </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>


   @include("Back.layout.FileJs")
@endsection
