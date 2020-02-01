<?php


namespace App\Http\view\Composers;


use App\Team;
use Illuminate\View\View;

class TeamComposer
{
    public function compose(View $view)
    {
        $view->with('teams', Team::all('id','name'));
    }

}
