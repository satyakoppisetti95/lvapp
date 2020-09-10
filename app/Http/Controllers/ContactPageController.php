<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class ContactPageController extends Controller
{
    //
    public function index(){
        $page = Page::find(2);
        return view('test')->with('page',$page);
    }
}
