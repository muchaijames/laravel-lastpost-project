<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;


class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index()
    {
        //dd(Post::find(6)->created_at);


        return view('dashboard');
    }
}
