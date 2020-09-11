<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\AppWideKey;

class ContactPageController extends Controller
{
    //
    public function index(){
        $page = Page::find(2);

        $contact_mail = AppWideKey::find(1)->value;
        $google_key = AppWideKey::find(2)->value;
        $fb_key = AppWideKey::find(3)->value;
        
        $data = array('page'=>$page, 'google_key'=>$google_key,'fb_key'=>$fb_key,'contact_mail'=>$contact_mail);
        return view('contact')->with($data);
    }
}
