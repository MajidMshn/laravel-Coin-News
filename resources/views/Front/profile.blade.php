
@extends('Front.index')
@section('title')
    پروفایل
@endsection

@section('content')


  <main>
      <section>
          <div class="container">
@include('errMsg')
              <div class="main1 shado justify-content-center">

                  <div class="card w-75">

                      <div class="card-header"><h3>پروفایل</h3>  </div>
{{--                      profile image--}}
                      <div class="card-body">
                      <div class="profileImage">
                          <img src="{{asset('/storage/profile/'.$user->name.'.jpg')}}" alt="profile image" id="profileImgInp">
                      </div>
                          <form method="POST" action="{{route('profile.update',$user->id)}}" enctype="multipart/form-data">
                              @csrf
                              {{--نام--}}
                              <div class="row mb-3">
                                  <label for="name" class="col-md-4 col-form-label text-md-end fw-bold">نام کاربری</label>

                                  <div class="col-md-6">
                                      <input id="name" type="text"
                                             class="form-control @error('name') is-invalid @enderror" name="name"
                                             value="{{$user->name}}" required autocomplete="name" autofocus>

                                      @error('name')
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                      @enderror
                                  </div>
                              </div>
                              {{--ایمیل--}}
                              <div class="row mb-3">
                                  <label for="email"
                                         class="col-md-4 col-form-label text-md-end fw-bold">ایمیل</label>

                                  <div class="col-md-6">
                                      <input id="email" type="email"
                                             class="form-control @error('email') is-invalid @enderror" name="email"
                                             value="{{$user->email}}" disabled>

                                      @error('email')
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                      @enderror
                                  </div>
                              </div>
{{--                         ***********************************     profile-picture--}}
                              <div class="row mb-3">
                                  <label for="image" class="col-md-4 col-form-label text-md-end fw-bold">عکس پروفایل</label>
                                  <div class="col-md-6">
                                      <input id="image-Input" type="file"
                                             class="form-control @error('profilePicture') is-invalid @enderror"
                                             name="image" accept="image/*">

                                      @error('profilePicture')
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                      @enderror
                                  </div>
                              </div>
{{--                              ***************************************************************--}}

{{--                              پسورد--}}
                              <div class="row mb-3">
                                  <label for="password"
                                         class="col-md-4 col-form-label text-md-end fw-bold">رمز عبور</label>

                                  <div class="col-md-6">
                                      <input id="password" type="password"
                                             class="form-control @error('password') is-invalid @enderror" name="password">

                                      @error('password')
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                      @enderror
                                  </div>
                              </div>

                              <div class="row mb-3">
                                  <label for="password-confirm"
                                         class="col-md-4 col-form-label text-md-end fw-bold">تکرار رمز عبور</label>

                                  <div class="col-md-6">
                                      <input id="password-confirm" type="password" class="form-control"
                                             name="password_confirmation" >
                                  </div>
                              </div>

                              <div class="row mb-0">
                                  <div class="col-md-6 offset-md-4">
                                      <button type="submit" class="btn btn-primary">
                                            تایید
                                      </button>
                                      <a href="{{route('Front.index')}}" class="btn btn-warning">
                                          انصراف
                                      </a>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>

          </div>
      </section>
  </main>




@endsection
