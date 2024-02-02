<?php

namespace App\Http\Controllers;

use App\Models\announcement;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $announcements = announcement::with('company')->paginate(4);
        return view('home',compact('announcements'));
    }
}
