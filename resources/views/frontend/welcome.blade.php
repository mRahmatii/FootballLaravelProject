@extends('frontend.layouts.default')

@section('title','football')

@section('description','teams inspired everyone in personal life')

@section('page_name','home')

@section('content')
    <section class="home">

        <div class="box">
                <header class="box__header">
                    <div class="box__header-title text-center">
                        <h3 class="subject">ثبت نام کاربر</h3>
                    </div>

                    <div class="progressbar">
                        <div id="progress-one" class="progressbar__item active"><span class="progressbar__circle"></span></div>
                        <div id="progress-two" class="progressbar__item"><span class="progressbar__circle"></span></div>
                        <div id="progress-three" class="progressbar__item"><span class="progressbar__circle"></span></div>
                    </div>
                </header>

                <div class="box__form">
                    <form  class="form" action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <section class="box__form-one" data-step="1">
                            <div class="form-group">
                                <input name="first_name" class="form-control form__input" type="text" minlength="3" placeholder="نام" autocomplete="off" data-content="پاسخ به این سوال ضروری است">
                                <label for="first_name" class="form__label">نام</label>
                            </div>

                            <div class="form-group">
                                <input name="last_name" class="form-control form__input" type="text" minlength="3" placeholder="نام خانوادگی" autocomplete="off" data-content="پاسخ به این سوال ضروری است">
                                <label for="last_name" class="form__label">نام خانوادگی</label>
                            </div>

                            <div class="box__footer text-center">
                                <button type="button" class="btn btn-next btn-lg ">ادامه</button>
                            </div>
                        </section>

                        <section  class="box__form-two" data-step="2">
                            <div class="row">
                                <div class="form-group col-md-6 col-12 text-center">
                                    <label for="profile" class="control-label"> بارگذاری عکس پروفایل</label>

                                    <div class="input-file">
                                        <img class="pic-preview" src="{{asset('img/user-profile-loading.jpg')}}">
                                        <input name="profile" type="file" class="form-control" data-content="بارگذاری عکس پروفایل ضروری است">
                                    </div>
                                </div>
                            </div>

                            <div class="box__footer text-center d-flex">
                                <button type="button" class="btn btn-next">ادامه</button>
                                <button type="button" class="btn btn-previous">قبلی</button>
                            </div>
                        </section>

                        <section class="box__form-three" data-step="3">

                            <div class="form-group">
                                <input name="email" class="form-control form__input" type="email" minlength="3" placeholder="پست الکترونیک" autocomplete="off" data-content="پاسخ به این سوال ضروری است">
                                <label for="email" class="form__label">پست الکترونیک</label>
                            </div>

                            <div class="form-group">
                                <input name="password" class="form-control form__input" type="password" minlength="3" placeholder="رمز عبور" autocomplete="off" >
                                <label for="password" class="form__label">رمز عبور</label>
                            </div>

                            <div class="box__footer text-center d-flex">
                                <button type="submit" class="btn btn-submit">ثبت</button>
                                <button type="button" class="btn btn-previous">قبلی</button>
                            </div>

                        </section>
                    </form>
                </div>
            </div>

    </section>
@endsection

@push('footer_scripts')
    <script src="{{ asset('backend/libs/bootstrap-filestyle/bootstrap-filestyle.min.js') }}"></script>
    <script>
        $(function () {

            $(":file").filestyle({
                buttonText: " انتخاب فایل",
                input: false,
                buttonName: "btn-custom",
                badge: false
            });

            $(":file").on('change', function () {
                readURL(this, $(this).closest('.input-file'));
            });

            $(".btn-next").on('click',function () {

                section= $(this).parent().parent();
                step=section.attr('data-step');
                if(step==1)
                {
                    ////step1
                    inputs = new Object();

                    inputs['first_name']= $('input[name="first_name"]').val();
                    inputs['last_name']=$('input[name="last_name"]').val();
                    inputs['state_id']=$('select[name="state_id"]').val();
                    inputs['city_id']= $('select[name="city_id"]').val();
                    inputs['gender']=$('input[name="gender"]:checked').val();

                    for(var index in inputs)
                    {
                        value=inputs[index];
                        elem=$('input[name="'+index+'"]');

                        if(index=='state_id' || index=='city_id')
                        {
                            elem=$('select[name="'+index+'"]');
                        }
                        if(value=="" )
                        {
                            elem.popover('show');
                            hidePopover(elem)
                            return false;
                        }
                    }
                    $('#progress-two').addClass('active')
                }
                else if(step==2)
                {
                    inputs = new Object();

                    inputs['profile']= $('input[name="profile"]').val();
                    inputs['melli']= $('input[name="melli"]').val();

                    for(var index in inputs)
                    {
                        value=inputs[index];
                        elem=$('input[name="'+index+'"]');
                        console.log(value)
                        if(value=="" )
                        {
                            elem.popover('show');
                            hidePopover(elem)
                            return false;
                        }
                    }

                    $('#progress-three').addClass('active')

                }
                else
                {
                    inputs = new Object();

                    inputs['email']= $('input[name="email"]').val();

                    for(var index in inputs)
                    {
                        value=inputs[index];
                        elem=$('input[name="'+index+'"]');
                        console.log(value)
                        if(value=="" )
                        {
                            elem.popover('show');
                            hidePopover(elem)
                            return false;
                        }
                    }
                }

                section.css('display','none');
                section.next().css('display','block');
            });

            $(".btn-previous").on('click',function () {
                section= $(this).parent().parent();
                section.css('display','none');
                section.prev().css('display','block')

                step=section.attr('data-step');
                if(step==2)
                {
                    $('#progress-two').removeClass('active')
                }
                else if(step==3)
                {
                    $('#progress-three').removeClass('active')
                }
            });

            $('select[name="state_id"]').on('change',function () {

                $('#cities').children().remove()
                $.ajax({
                    url:base_url()+'admin/users/cities',
                    type:'Post',
                    dataType:'JSON',
                    data:{
                        id:$(this).val()
                    },
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    success: function (msg)
                    {
                        $('#cities').append(msg.data);
                    }
                })

            })
        });

        function hidePopover(elem) {
            elem.on('shown.bs.popover', function () {
                var $pop = $(this);
                setTimeout(function () {
                    $pop.popover('hide');
                }, 2000);
            });
        }

        function readURL(input,parent)
        {
            if(input.files && input.files[0])
            {
                var reader=new FileReader();

                reader.onload=function(e)
                {
                    parent.find('.pic-preview').attr('src',e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endpush

@section('stylesheets')
    <style>
        .input-file >img
        {
            width: 150px;
            height: 145px;
            display: block;
            margin: auto;
            object-fit: cover;
            border-radius: 3px;
        }

        .input-file .remove
        {
            position: absolute;
            cursor: pointer;
        }

        .bootstrap-filestyle
        {
            width: 150px;
            margin: auto;
        }

        .bootstrap-filestyle .btn
        {
            display: block;
            width: 100%;
        }

        .group-span-filestyle
        {
            width: 100%;
        }
    </style>
@endsection


