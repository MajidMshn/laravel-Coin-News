
@foreach($comment as $com)
    <div class="answerComment" id="answerCom">
        <div class="comment-response" >
            <div class="response-content" id="answerCom">
                <h3>پاسخ خود را ثبت کنید</h3>
                <form action="{{route('reply.store')}}" method="post">
                    @csrf
                    <table>
                        <tr>
                            <td>
                                <textarea rows="6" cols="80" name="msg" required></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input style="width: 49%" type="text" name="name" placeholder="نام خود را وارد کنید" required>

                                <input style="width: 49%" type="email" name="email" placeholder="ایمیل خود را وارد کنید" required>
                                <input type="hidden" name="article_id" value="{{ $com->article_id }}">

                                <input type="hidden" id="como" name="parent_id" value="">


                            </td>
                        </tr>
                        <tr>
                            <td>
                                {!! htmlFormSnippet() !!}
                            </td>
                        </tr>
                        <tr>

                            <td>
                                <button class="btn btn-success" type="submit">ثبت نظر</button>
                                <button onclick="openAnswer()" class="btn btn-danger">انصراف</button>
                            </td>

                        </tr>
                    </table>

                </form>

            </div>
        </div>
    </div>

@endforeach






{{--<div class="answerComment" id="answerCom">--}}
{{--<div class="comment-response">--}}
{{--    <div class="response-content">--}}
{{--        <h3>پاسخ خود را ثبت کنید</h3>--}}
{{--        <form action="{{route('comment.store',$article->slug)}}" method="post">--}}
{{--            @csrf--}}
{{--            <table>--}}
{{--                <tr>--}}
{{--                    <td>--}}
{{--                        <textarea rows="6" cols="80" name="msg" required></textarea>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>--}}
{{--                        <input style="width: 49%" type="text" name="name" placeholder="نام خود را وارد کنید" required>--}}

{{--                        <input style="width: 49%" type="email" name="email" placeholder="ایمیل خود را وارد کنید" required>--}}
{{--                        <input type="hidden" name="parent_id">--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>--}}
{{--                        {!! htmlFormSnippet() !!}--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--                <tr>--}}

{{--                    <td>--}}
{{--                        <button class="btn btn-success" type="submit">ثبت نظر</button>--}}
{{--                        <button onclick="openAnswer()" class="btn btn-danger">انصراف</button>--}}
{{--                    </td>--}}

{{--                </tr>--}}
{{--            </table>--}}

{{--        </form>--}}

{{--    </div>--}}
{{--</div>--}}
{{--</div>--}}
