<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThemeController extends Controller
{
    public function changeTheme($theme)
    {
        $user = User::find(Auth::user()->id);
        $user->update([
            'theme' => $theme,
        ]);
        return back();
    }
}
