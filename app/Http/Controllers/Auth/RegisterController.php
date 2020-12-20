<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('modules.register');
    }

    public function register(Request $request)
    {
        $check = User::where('email',$request->email)->get();
        if ($check->count() > 0){
            return redirect()->back()->withInput($request->input())->with('failed','Email sudah dipakai');
        }
        try {
            DB::beginTransaction();
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => 1,
                'address' => $request->address,
                'gender' => $request->gender,
                'phone' => $request->phone
            ]);
            DB::commit();

            return redirect()->route('login.form');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }
    }
}
