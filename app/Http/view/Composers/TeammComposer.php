<?php


namespace App\Http\view\Composers;


use App\Teamm;
use Illuminate\View\View;

class TeammComposer
{
    public function compose(View $view)
    {
        $view->with('teams', Teamm::all('id','name'));
    }

}
