<?php

namespace App\Http\Controllers;

use App\City;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $title = 'لیست کاربران';
        $subTitle = 'در اینجا می توانید لیست کاربران را مشاهده کنید ';
        $limit = 10;
        $text = $request->text;
        $city = $request->city;
        $order=$request->order;

        $helper=new PublicFunctionController();
        $fromDate = $helper->getGeorgianDate($request->fromDate);
        $toDate = $helper->getGeorgianDate($request->toDate);

        $query = User::where('type', 2)->with(['city']);

        $cities=City::where('parent_id','!=',0)->get(['name','id']);


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

        if (!empty($request->city))
        {
            $query->where('city_id',$city);
        }


        if(!empty($request->toDate) && !empty($request->fromDate))
        {
            $query = $query->where(function ($query) use ($fromDate,$toDate) {
                $query->whereBetween('created_at',array($fromDate,$toDate));
            });
        }

        $users = $query->orderBy('created_at', !empty($order) ? $order :'desc')->paginate($limit)
                ->appends(
                    array(
                        'text' => !empty($text) ? $text : '',
                        'city' => !empty($city) ? $city : '',
                        'fromDate' => !empty($fromDate) ? $fromDate : '',
                        'toDate' => !empty($toDate) ? $toDate : '',
                        'order'=> !empty($order) ? $order : '',
                    )
                );


        if ($request->ajax())
        {
            return response()->json(array(
                'body' => view('backend.Elements.users',
                    compact('users', 'text', 'title', 'subTitle', 'cities','users'))->render()
            ), JSON_UNESCAPED_UNICODE);
        }

        return View('backend.users.index', compact('title', 'subTitle','cities','users'));

    }

    public function store(Request $request)
    {
        $input=$request->all();

        $input['password']=Hash::make($request->password);


        $user=User::create($input);

        $img_icon = Image::make($request->profile);

        $img_icon->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save(public_path('img/users/profiles/'.$user->id.'.jpg'),80,'jpg');

        $img_melli = Image::make($request->melli);

        $img_melli->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save(public_path('img/users/proof/'.$user->id.'.jpg'),80,'jpg');

        return redirect('/')->with('message','با تشکر');

    }

    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $user = User::findOrFail($request->id);
            if ($user->delete()) {
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
