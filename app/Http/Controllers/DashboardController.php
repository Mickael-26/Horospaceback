<?php

namespace App\Http\Controllers;

use App\Models\IntroContent;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $themes = IntroContent::select( 'intro_contents.title','intro_contents.theme_id', 'theme_contents.description', 'themes.status')
            ->join('themes','themes.id','=','intro_contents.theme_id')
            ->join('theme_contents', 'theme_contents.theme_id', "=", "themes.id")
            ->where("intro_contents.language_id", "=" , 1)
            ->where("theme_contents.language_id", "=" , 1)
            ->whereNull('themes.deleted_at')
            ->get();
        $users = User::whereNull('deleted_at')->get();
       
        return view("dashboard", compact("themes","users"));
    }

    public function delete(int $id)
    {
        
        Theme::findOrFail($id)->delete();

        return back()->with("success","theme-deleted");
    }

    public function activeTheme(Theme $theme)
    {
        $theme->status = 'active';
        $theme->save();

        return back()->with("success", "theme-activated");
    }
}
