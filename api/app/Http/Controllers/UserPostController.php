<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;


class UserPostController extends Controller
{
    public function allPosts()
    {
        $User = User::findOrFail(auth()->user()->id);
        $Posts = $User->postings()->with('User','Spot')->get();

        return response()->json($Posts);


    }

}
