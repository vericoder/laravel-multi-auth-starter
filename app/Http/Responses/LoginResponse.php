<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {   
        return $request->wantsJson()
        ? response()->json(['two_factor' => false])
        : $this->redirect();
    }
    
    private function redirect()
    {
        if (Auth::user()->role_id == 1) {
            return redirect('admin');
        }

        return redirect(config('fortify.home'));
    }
}