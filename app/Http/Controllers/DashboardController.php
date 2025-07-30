<?php

namespace App\Http\Controllers;

use App\Models\IntroContent;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Nette\Utils\Image;
class DashboardController extends Controller
{
    /**
     * Summary of dashboard
     * @return Illuminate\View\View
     */
    public function dashboard(): View
    {
        $themes = IntroContent::select( 'intro_contents.title','intro_contents.theme_id', 'theme_contents.description', 'themes.status')
            ->join('themes','themes.id','=','intro_contents.theme_id')
            ->join('theme_contents', 'theme_contents.theme_id', '=', 'themes.id')
            ->where('intro_contents.language_id', '=' , 1)
            ->where('theme_contents.language_id', '=' , 1)
            ->whereNull('themes.deleted_at')
            ->get();
        $users = User::whereNull('deleted_at')->get();
       
        return view('dashboard', compact('themes','users'));
    }

    /**
     * Summary of delete
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(int $id): RedirectResponse
    {
        
        Theme::findOrFail($id)->delete();

        return back()->with('success','theme-deleted');
    }

    /**
     * Summary of activeTheme
     * @param \App\Models\Theme $theme
     * @return RedirectResponse
     */
    public function activeTheme(Theme $theme): RedirectResponse
    {
        $theme->status = 'active';
        $theme->save();

        return back()->with('success', 'theme-activated');
    }
}
