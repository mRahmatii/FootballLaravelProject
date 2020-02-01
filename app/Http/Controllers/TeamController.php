<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use App\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{

    public function index(Request $request)
    {
        $title = 'لیست تیمها';
        $subTitle = 'در اینجا می توانید لیست تیم را مشاهده کنید ';
        $limit = 10;
        $text = $request->text;
        $query = Team::select();

        if (!empty($request->text))
        {
            $query->where('name', 'LIKE', '%' . $text . '%');
        }

        if (!empty($request->limit))
        {
            $limit = $request->limit;
        }

        $teams= $query->orderBy('created_at','desc')->paginate($limit)
            ->appends(
                array(
                    'text' => !empty($text) ? $text : '',
                )
            );


        if ($request->ajax())
        {
            return response()->json(array(
                'body' => view('backend.Elements.teams',
                    compact('users', 'text', 'title', 'subTitle', 'teams'))->render()
            ), JSON_UNESCAPED_UNICODE);
        }

        return View('backend.teams.index', compact('title', 'subTitle','teams'));
    }

    public function create()
    {
        $title = 'ایجاد تیم';
        $subTitle = 'در اینجا می توانیدتیم جدید را اضافه کنید ';

        return view('backend.teams.create',compact('title','subTitle'));
    }

    public function store(TeamRequest $request)
    {
        Team::create($request->all());

        return redirect('admin/teams')->with('message','با تشکر');
    }

    public function show(Team $team)
    {
        //
    }

    public function edit(Team $team)
    {
        $title = 'ایجاد تیم';
        $subTitle = 'در اینجا می توانیدتیم جدید را اضافه کنید ';

        return view('backend.teams.edit',compact('title','subTitle','team'));
    }

    public function update(TeamRequest $request, Team $team)
    {
        $team->update($request->all());

        return redirect('admin/teams')->with('message','با تشکر');
    }

    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $team = Team::findOrFail($request->id);
            if ($team->delete()) {
                return response()->json(array(
                    'status' => '1',
                    'message' => 'رکورد شما با موفقیت حذف شد'

                ), JSON_UNESCAPED_UNICODE);
            } else {
                return response()->json(array(
                    'status' => '0',
                    'message' => 'مشکلی در سرور بهوجود آمده است لطفا دوباره تلاش کنید'

                ), JSON_UNESCAPED_UNICODE);
            }
        }
    }
}
