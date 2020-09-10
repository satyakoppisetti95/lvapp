<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class HomePageController extends Controller
{
    //index page
    public function index(){
        $page = Page::find(1);
        return view('test')->with('page',$page);
    }
}
