@extends('frontend.layouts.default')

@section('title','football')

@section('description','teams inspired everyone in personal life')

@section('page_name','home')

@section('content')

    @if (Session::has('store'))
        <div class="alert alert-success">{{session('store')}}
            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
        </div>
    @endif

    <section class="home">

        <div class="box">
                <header class="box__header">
                    <div class="box__header-title text-center">
                        <h3 class="subject">ثبت نام ادمین</h3>
                    </div>
                </header>

                <div class="box__form">
                    <form  class="form" action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                            <div class="form-group">
                                <input name="first_name" class="form-control form__input" type="text" minlength="3" placeholder="نام" autocomplete="off" data-content="enter your name">
                                <label for="first_name" class="form__label">نام</label>
                            </div>

                            <div class="form-group">
                                <input name="last_name" class="form-control form__input" type="text" minlength="3" placeholder="نام خانوادگی" autocomplete="off" data-content="enter your last_name">
                                <label for="last_name" class="form__label">نام خانوادگی</label>
                            </div>

                            <div class="form-group">
                                <input name="email" class="form-control form__input" type="email" minlength="3" placeholder="پست الکترونیک" autocomplete="off" data-content="enter your email" required>
                                <label for="email" class="form__label">پست الکترونیک</label>
                            </div>

                            <div class="form-group">
                                <input name="password" class="form-control form__input" type="password" minlength="3" placeholder="رمز عبور" autocomplete="off" data-content="enter your password" required>
                                <label for="password" class="form__label">رمز عبور</label>
                            </div>

                            <div class="box__footer text-center">
                                <button type="submit" class="btn btn-submit btn-submit--register">ثبت</button>
                            </div>
                    </form>
                </div>
            </div>

    </section>
@endsection

@push('footer_scripts')
    <script>
        $(function () {

            $('.btn-submit--register').on('click',function ()
            {
             inputs = new Object();

                inputs['first_name']= $('input[name="first_name"]').val();
                inputs['last_name']=$('input[name="last_name"]').val();
                // inputs['password']= $('input[name="password"]').val();
                // inputs['email']= $('input[name="email"]').val();


                for(var index in inputs)
                {
                    value=inputs[index];
                    elem=$('input[name="'+index+'"]');


                    if(value=="" )
                    {
                        elem.popover('show');
                        hidePopover(elem);
                        return false;
                    }
                }
            });


            function hidePopover(elem)
            {
                elem.on('shown.bs.popover', function () {
                    var $pop = $(this);
                    setTimeout(function () {
                        $pop.popover('hide');
                    }, 2000);
                });
            }
        });
    </script>

@endpush




