<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function dashobard(){

        $blogs = Blog::all();
        return view('admin.dashboard')->with([

            'blogs' => $blogs->count()
        ]);




    }


}
