<div class="col-md-1"></div>
<div class="col-md-12">
        <div>
            <a class="btn btn-success bg-blue" href="{{route('teamms.create')}}"
               style="margin-bottom: 10px; margin-top: 20px">اضافه کردن تیم جدید <i class="fa  fa-plus"></i>
            </a>
        </div>
    <div class="col-xs-12">
        <div class="box-body table-responsive no-padding">
            <table class="table table-striped">
                <tbody>
                <tr>
                    <th>نام</th>
                    <th>تاریخ ایجاد</th>
                    <th>عملیات</th>
                </tr>
                @if(!empty($teams))
                    @foreach($teams as $team)

                        <tr data-id="{{$team->id}}">
                            <td>{{$team->name}}</td>

                            @php
                                $PersianregisteredDate= new Verta($team->created_at)
                            @endphp
                            <td>{{$PersianregisteredDate->format('Y-n-j H:i:s')}}</td>
                            <td class="operation">
                                <a class="btn btn-info" href="#">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-info" href="{{route('teamms.edit',$team->id)}}">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>
                                <button type="button" class="delete btn btn-danger" aria-hidden="true" title=""
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
            $teams-> appends(array(

                'text'=>!empty($text)?$text:'',

            ))->links()
            }}
        </ul>
    </div>
</div>

