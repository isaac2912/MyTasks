<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    function show_post($id, $name, $password){
        return view('post', compact('id', 'password','name'));
    }
}
