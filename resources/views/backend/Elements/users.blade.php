<div class="col-md-1"></div>
<div class="col-md-12">
    {{--    <div>--}}
    {{--        <a class="btn btn-success bg-blue" href="{{route('users.create')}}"--}}
    {{--           style="margin-bottom: 10px; margin-top: 20px">اضافه کردن کاربر جدید <i class="fa  fa-plus"></i>--}}
    {{--        </a>--}}
    {{--    </div>--}}
    <div class="col-xs-12">
        <div class="box-body table-responsive no-padding">
            <table class="table table-striped">
                <tbody>
                <tr>
                    <th>نام</th>
                    <th>نام خانوادگی</th>
                    <th>تاریخ ایجاد</th>
                    <th>عملیات</th>
                </tr>
                @if(!empty($users))
                    @foreach($users as $user)

                        <tr data-id="{{$user->id}}">
                            <td>{{$user->first_name}}</td>
                            <td>{{$user->last_name}}</td>
                            @php
                                $PersianregisteredDate= new Verta($user->created_at)
                            @endphp
                            <td>{{$PersianregisteredDate->format('Y-n-j H:i:s')}}</td>
                            <td class="operation">
                                <a class="btn btn-info" href="#">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-info" href="#">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>
                                <button type="button" class="deleteService btn btn-danger" aria-hidden="true" title=""
                                        data-toggle="tooltip" data-original-title="حذف">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</div>

<div class="col-md-1"></div>
<div class="row text-center">
    <div class="col-lg-12">
        <ul class="pagination">
            {{
            $users-> appends(array(
                'text'=>!empty($text)?$text:'',
                'limit'=>!empty($limit)?$limit:10,
                'fromDate'=>!empty($fromDate)?$fromDate:'',
                'toDate'=>!empty($toDate)?$toDate:'',

            ))->links()
            }}
        </ul>
    </div>
</div>

