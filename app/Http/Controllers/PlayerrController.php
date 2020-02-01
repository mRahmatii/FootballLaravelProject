<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlayerRequest;
use App\Playerr;
use Illuminate\Http\Request;

class PlayerrController extends Controller
{
    public function index(Request $request)
    {
        $title = 'لیست بازیکن';
        $subTitle = 'در اینجا می توانید لیست بازیکن را مشاهده کنید ';
        $limit = 10;
        $text = $request->text;
        $query = Playerr::select();

        if (!empty($request->text))
        {
            $query = $query->where(function ($query) use ($text) {
                $query->orwhere('first_name', 'LIKE', '%' . $text . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $text . '%');
            });
        }

        if (!empty($request->limit))
        {
            $limit = $request->limit;
        }

        $players= $query->orderBy('created_at','desc')->paginate($limit)
            ->appends(
                array(
                    'text' => !empty($text) ? $text : '',
                )
            );


        if ($request->ajax())
        {
            return response()->json(array(
                'body' => view('backend.Elements.playerrs',
                    compact('users', 'text', 'title', 'subTitle', 'players'))->render()
            ), JSON_UNESCAPED_UNICODE);
        }

        return View('backend.playerrs.index', compact('title', 'subTitle','players'));
    }

    public function create()
    {
        $title = 'ایجاد بازیکن';
        $subTitle = 'در اینجا می توانیدبازیکن جدید را اضافه کنید ';

        return view('backend.playerrs.create',compact('title','subTitle'));
    }

    public function store(PlayerRequest $request)
    {
        $player=Playerr::create($request->all());

        $player->teams()->attach($request->team_ids);

        return redirect('admin/playerrs')->with('message','با تشکر');
    }

    public function show(Playerr $player)
    {
        //
    }

    public function edit(Playerr $playerr)
    {
        $title = 'ایجاد بازیکن';
        $subTitle = 'در اینجا می توانیدبازیکن جدید را اضافه کنید ';

        $teams=[];
        if($playerr->teams)
        {
            foreach ($playerr->teams as $team)
            {
                $teams[]=$team->pivot->teamm_id;
            }
        }

        return view('backend.playerrs.edit',compact('title','subTitle','playerr','teams'));
    }

    public function update(PlayerRequest $request, Playerr $playerr)
    {
        $playerr->update($request->all());
        $playerr->teams()->sync($request->team_ids);

        return redirect('admin/playerrs')->with('message','با تشکر');
    }

    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $player = Playerr::findOrFail($request->id);
            if ($player->delete()) {
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
