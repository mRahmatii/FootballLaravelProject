<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlayerRequest;
use App\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{

    public function index(Request $request)
    {
        $title = 'لیست بازیکن';
        $subTitle = 'در اینجا می توانید لیست بازیکن را مشاهده کنید ';
        $limit = 10;
        $text = $request->text;
        $query = Player::select();

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
                'body' => view('backend.Elements.players',
                    compact('users', 'text', 'title', 'subTitle', 'players'))->render()
            ), JSON_UNESCAPED_UNICODE);
        }

        return View('backend.players.index', compact('title', 'subTitle','players'));
    }

    public function create()
    {
        $title = 'ایجاد بازیکن';
        $subTitle = 'در اینجا می توانیدبازیکن جدید را اضافه کنید ';

        return view('backend.players.create',compact('title','subTitle'));
    }

    public function store(PlayerRequest $request)
    {
        Player::create($request->all());

        return redirect('admin/players')->with('message','با تشکر');
    }

    public function show(Player $player)
    {
        //
    }

    public function edit(Player $player)
    {
        $title = 'ایجاد بازیکن';
        $subTitle = 'در اینجا می توانیدبازیکن جدید را اضافه کنید ';

        $teams=[];
        if($player->teams)
        {
            foreach ($player->teams as $team)
            {
                $teams[]=$team->pivot->teamm_id;
            }
        }

        return view('backend.players.edit',compact('title','subTitle','player','teams'));
    }

    public function update(PlayerRequest $request, Player $player)
    {
        $player->update($request->all());

        return redirect('admin/players')->with('message','با تشکر');
    }

    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $player = Player::findOrFail($request->id);
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
