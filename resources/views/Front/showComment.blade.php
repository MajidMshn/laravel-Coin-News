<h3 style="color: red;margin-top: 20px;text-align: center">نظرات کاربران</h3><br><br>
<hr>
@foreach($comments as $c)
@if($c->status !== 0)

    <div class="mohtava" >
        <div class="row-comment">
            <div style="float: right;"><b>{{$c->name}}</b></div>
            <div style="text-align: left"><p>
                    {!! jdate($c->created_at)->format('%A %d %B %Y') !!}</p>
            </div>
        </div>

        <p style="margin-right: 10px">{!! $c->msg !!}</p>

        <div class="row-comment">
            <div>

                <a href="javascript:void(0)"  style="text-decoration: none" onclick="openAnswer({{$c->id}})">

                    <b style="color: red;font-size: 16px" >
                        پاسخ
                        <ion-icon name="arrow-redo-outline"></ion-icon>
                    </b>

                </a>

            </div>
            <div style="text-align: left;font-size: 30px">
                <span>{{$c->likes}}</span>
                <b style="" id="like-b">
                    <ion-icon onclick="like(this)" id="heart" style="overflow: hidden"
                              name="heart-outline"></ion-icon>
                </b>
            </div>
        </div>
        <hr>
    </div>
    @include('Front.reply',['reply'=>$c->reply,'c'=>$c,'comments'=>$comments])

    @include('Front.responseComment')
    {{--    @include('Front.responseComment',['comment'=>$c->reply,'parent_id'=>$c->id])--}}
    {{--                    answer--}}
    {{--    ************************************************************--}}

    {{--    ************************************************************--}}
    {{--                    end answer--}}
@endif
@endforeach



