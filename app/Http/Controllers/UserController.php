<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class UserController extends Controller
{
    public function verified()
    {
        $user = auth()->user();
        if (!$user->verified_at) {
            $user->update([
                'verified_at' => Carbon::now() 
            ]);
        }
        return redirect('/');
    }
}
