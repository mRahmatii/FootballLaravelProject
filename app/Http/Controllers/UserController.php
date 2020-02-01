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

        $helper=new PublicFunctionController();
        $fromDate = $helper->getGeorgianDate($request->fromDate);
        $toDate = $helper->getGeorgianDate($request->toDate);

        $query = User::select();


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


        if(!empty($request->toDate) && !empty($request->fromDate))
        {
            $query = $query->where(function ($query) use ($fromDate,$toDate) {
                $query->whereBetween('created_at',array($fromDate,$toDate));
            });
        }

        $users = $query->orderBy('created_at','desc')->paginate($limit)
                ->appends(
                    array(
                        'text' => !empty($text) ? $text : '',
                        'fromDate' => !empty($fromDate) ? $fromDate : '',
                        'toDate' => !empty($toDate) ? $toDate : '',
                    )
                );


        if ($request->ajax())
        {
            return response()->json(array(
                'body' => view('backend.Elements.users',
                    compact('users', 'text', 'title', 'subTitle','users'))->render()
            ), JSON_UNESCAPED_UNICODE);
        }

        return View('backend.users.index', compact('title', 'subTitle','users'));

    }

    public function store(Request $request)
    {

        $input=$request->all();

        $input['password']=Hash::make($request->password);

        User::create($input);

        return redirect('/')->with('store','با تشکر از ثبت نام  شما');

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
