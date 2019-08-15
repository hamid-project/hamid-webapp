<?php

namespace App\Http\Controllers\MyAccount;

use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MyAccountController extends Controller
{
    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function password_edit(Request $request)
    {
        $user = \Auth::user();

        return view('myaccount.password_edit', [
            'user' => $user,
        ]);
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function password_update(Request $request)
    {
        $user = \Auth::user();

        $validatedData = $request->validate([
            'new_password' => 'string|required|min:8|confirmed',
        ]);

        $user->password = \App\User::makeHashedPassword($request->new_password);
        $user->save();

        return view('myaccount.password_update', [
            'user' => $user,
        ]);
    }
}
