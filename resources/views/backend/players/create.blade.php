@extends('backend.layouts.boxed')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                {{$title}}
                <small>{{$subTitle}}</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$title}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                                title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <form  action="{{route('players.store')}}" method="post" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-md-4">
                            <label for="first_name" class="control-label">نام </label>

                            <input name="first_name" type="text" class="form-control" placeholder="تیم" value="{{old('first_name')}}">
                            @if ($errors->has('first_name'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group col-md-4">
                            <label for="last_name" class="control-label">نام خانوادگی</label>

                            <input name="last_name" type="text" class="form-control" placeholder="تیم" value="{{old('last_name')}}">
                            @if ($errors->has('last_name'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group col-md-4">

                            <label for="team_ids" class="control-label ">نام تیم</label>

                            @include('backend.Partials.teams.dropdown' ,['multiple'=>true])
                            @if ($errors->has('team_ids'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('team_ids') }}</strong>
                                    </span>
                            @endif
                        </div>


                        <div class="form-group col-md-12 text-center">
                            <button class="btn btn-success col-xs-4" type="submit">ثبت</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('backend/js/players/create.js') }}"></script>
@endsection

