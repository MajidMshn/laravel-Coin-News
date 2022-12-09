@foreach($reply as $r)
      @if($r->status !== 0 )

             <div id="replyDiv" class="mohtava" style="background-color:rgba(164,161,161,0.29);margin:3px">
                 <div class="row-comment">

                     <div style="float: right;"><b>{{$r->name}}  در پاسخ به {{$c->name}} </b></div>
                     <div style="text-align: left"><p>
                             {!! jdate($r->created_at)->format('%A %d %b %Y') !!}</p>
                     </div>
                 </div>

                 <p style="margin-right: 10px">{!! $r->msg !!}</p>

                 <div class="row-comment">
                     <div>

                         <a href="javascript:void(0)"  style="text-decoration: none" onclick="openAnswer({{$r->id}})">

                             <b style="color: red;font-size: 14px" >
                                 پاسخ
                                 <ion-icon name="arrow-redo-outline"></ion-icon>
                             </b>

                         </a>

                     </div>
                     <div style="text-align: left;font-size: 30px">
                         <span>{{$r->likes}}</span>
                         <b style="" id="like-b">
                             <ion-icon onclick="like(this)" id="heart" style="overflow: hidden"
                                       name="heart-outline"></ion-icon>
                         </b>
                     </div>
                 </div>
                 <hr>
        @include('Front.reply',['reply'=>$r->reply,'c'=>$r])
             </div>


      @endif


@endforeach
