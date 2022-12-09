

       <div class="comment">
           <button class="btn btn-warning" disabled>نظرات</button>

           <form action="{{route('comment.store',$article->slug)}}" method="post">
               @csrf
               <br>
               <div class="form-group">
                   <lable for="msg" class="form-label">نظر خود را با ما به اشتراک بگذارید <b>(برای ارسال نظر ابتدا باید به حساب کاربری خود وارد شوید)</b></lable>
                   <br>  <textarea class="form-control"  name="msg" required></textarea>
               </div>

               <br>
               <div class="form-group">
                   <input class="form-control" type="text" name="name" placeholder="نام خود را وارد کنید" required>

               </div>
               <br>
               <div class="form-group">
                   <input class="form-control" type="email" name="email" style="text-align: right" placeholder="ایمیل خود را وارد کنید" required>
               </div>
               <br>
               <div class="form-group">

                       {!! htmlFormSnippet() !!}

               </div>
               <br>
                           <button class="btn btn-success" type="submit">ثبت نظر</button>

           </form>
       </div>



