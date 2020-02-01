<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use App\Teamm;
use Illuminate\Http\Request;

class TeammController extends Controller
{
    public function index(Request $request)
    {
        $title = 'لیست تیمها';
        $subTitle = 'در اینجا می توانید لیست تیم را مشاهده کنید ';
        $limit = 10;
        $text = $request->text;
        $query = Teamm::select();

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
                'body' => view('backend.Elements.teamms',
                    compact('users', 'text', 'title', 'subTitle', 'teams'))->render()
            ), JSON_UNESCAPED_UNICODE);
        }

        return View('backend.teamms.index', compact('title', 'subTitle','teams'));
    }

    public function create()
    {
        $title = 'ایجاد تیم';
        $subTitle = 'در اینجا می توانیدتیم جدید را اضافه کنید ';

        return view('backend.teamms.create',compact('title','subTitle'));
    }

    public function store(TeamRequest $request)
    {
        Teamm::create($request->all());

        return redirect('admin/teamms')->with('message','با تشکر');
    }

    public function show(Teamm $team)
    {
        //
    }

    public function edit(Teamm $teamm)
    {
        $title = 'ایجاد تیم';
        $subTitle = 'در اینجا می توانید تیم جدید را اضافه کنید ';

        return view('backend.teamms.edit',compact('title','subTitle','teamm'));
    }

    public function update(TeamRequest $request, Teamm $teamm)
    {
        $teamm->update($request->all());

        return redirect('admin/teamms')->with('message','با تشکر');
    }

    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $team = Teamm::findOrFail($request->id);
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
