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
                    <div id="example1_wrapper" >
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="dataTables_length">
                                    <select name="limit" class="form-control col-md-2">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div id="example1_filter" class="dataTables_filter" style="float: left">
                                    <input type="search" class="form-control" placeholder="جستجو کنید" id="search">
                                </div>
                            </div>
                        </div>
                        @if (Session::has('delete'))
                            <div class="alert alert-danger">{{session('delete')}}
                                <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                            </div>
                        @endif
                        @if (Session::has('update'))
                            <div class="alert alert-info">{{session('update')}}
                                <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                            </div>
                        @endif
                        @if (Session::has('store'))
                            <div class="alert alert-success">{{session('store')}}
                                <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                            </div>
                        @endif
                        <div class="filters-btn">
                            <button id="filter-btn" class="btn btn-primary btn-sm btn-filters bg-blue"><i class="fa fa-filter"></i> فیلترها</button>
                        </div>
                        <div class="filters-section">
                            <div class="row">

                                <div class="form-group col-md-3">
                                    <input  autocomplete="off" name="fromDate" type="text" class="date form-control" placeholder="از تاریخ">
                                </div>

                                <div class="form-group col-md-3">
                                    <input autocomplete="off" name="toDate" type="text" class="date form-control" placeholder="تا تاریخ">
                                </div>

                            </div>


                            <div class="form-group col-md-12 text-center">
                                <button id="applyFilter" type="submit" class="btn btn-primary btn-sm bg-blue">اعمال فیلتر</button>
                            </div>
                        </div>
                        <div class="row" id="allDataUpdate">

                            @include('backend.Elements.users')

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('scripts')
    <script src="{{ asset('backend/js/users/index.js') }}"></script>
@stop
