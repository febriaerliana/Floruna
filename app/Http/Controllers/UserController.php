<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        return view('modules.dashboard.profile');
    }

    public function update(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = User::find(Auth::id());
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'gender' => $request->gender,
                'phone' => $request->phone
            ]);

            if ($request->has('password')) {
                $user->update([
                    'password' => bcrypt($request->password)
                ]);
            }
            DB::commit();
            return redirect()->route('dashboard.profile.update',Auth::user()->isA('admin') ? 'admin' : 'user');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }
    }
}
