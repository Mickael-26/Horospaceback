<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserAccountRequest;
use Illuminate\View\View;

class AdminController extends Controller
{
  
    /**
     * Summary of account
     * @param \Illuminate\Http\Request $request
     * @return RedirectResponse|\Illuminate\Contracts\View\View
     */
    public function account(Request $request): RedirectResponse|View
    {
        if(!Gate::allows('admin',Auth::user() )){
            return back();
        }
        $roles = Role::havingBetween('id', [2,3])->groupBy(['name', 'id'])->get();

        return view('admin.add-account', compact('roles'));
    }
    /**
     * Summary of delete
     * @param \App\Models\User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(User $user): RedirectResponse
    {
        $user->delete();

        return back()->with('success','user-deleted');
    }

    /**
     * Summary of addAccount
     * @param \Illuminate\Http\Request $request
     * @return RedirectResponse
     */
    public function addAccount(UserAccountRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $user = User::create([
            'name' => $data['name'],
            'email'=> $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => $data['role_id']
        ]);

        return back()->with('status','account-added');
    }
}
