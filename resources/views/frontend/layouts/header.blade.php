
<header class="header">

    <nav class="navbar main-menu navbar-expand-lg navbar-light header__navber">
        <div class="navbar-brand header__logo-box">
            <a href="#">
                <img  class="header__logo" src="{{asset('img/logo.png')}}" alt="football">
            </a>
        </div>

        <div class="menu-toggle">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse  header__navbar-collapse">

            <ul class="navbar-nav mr-auto header__navbar-nav">
                <li class="nav-item header__nav-item">
                    <a class="nav-link" href="#">خانه</a>
                </li>

                <li class="nav-item header__nav-item">
                    <a class="nav-link" href="#">وبلاگ</a>
                </li>

                <li class="nav-item header__nav-item">
                    <a class="nav-link" href="#">نمونه کارها</a>
                </li>

                <li class="nav-item header__nav-item">
                    <a class="nav-link" href="#">خدمات</a>
                </li>

                <li class="nav-item header__nav-item">
                    <a class="nav-link" href="#">درباره ما</a>
                </li>


                <li class="nav-item header__nav-item">
                    <a class="nav-link" href="#">تماس با ما</a>
                </li>

                <li class="nav-item login-item header__nav-button">
                    <button class="btn-login btn mybtn-outline btn-lg" data-toggle="modal"
                            data-target="#loginModal"><i class="fi fi-user fi-before"></i>ورود
                    </button>
                </li>
            </ul>
        </div>
    </nav>
</header>

<div class="modal fade" id="loginModal" >
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" style="padding: 1rem 6rem;">

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-10">

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="email" class="col-md-4">ایمیل</label>

                                        <input id="email" type="text"
                                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form__input"
                                               name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                                        @endif
                                </div>

                                <div class="form-group">
                                    <label for="password" class="col-md-4">رمز عبور</label>

                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}  form__input"
                                               name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                                        @endif
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-submit">ورود</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
