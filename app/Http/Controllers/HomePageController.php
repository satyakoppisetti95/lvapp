<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\AppWideKey;

class HomePageController extends Controller
{
    //index page
    public function index(){
        $page = Page::find(1);
        $google_key = AppWideKey::find(2)->value;
        $fb_key = AppWideKey::find(3)->value;
        
        $data = array('page'=>$page, 'google_key'=>$google_key,'fb_key'=>$fb_key);
        return view('test')->with($data);
    }
}
