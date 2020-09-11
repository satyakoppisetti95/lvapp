<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Page;
use App\AppWideKey;

class AdminPageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    } 
    //
    public function index(){
        $contact_mail = AppWideKey::find(1)->value;
        $google_key = AppWideKey::find(2)->value;
        $fb_key = AppWideKey::find(3)->value;
        $pages = Page::all();
        $data = array('pages'=>$pages, 'google_key'=>$google_key,'fb_key'=>$fb_key,'contact_mail'=>$contact_mail);
        return view('admin')->with($data);
    }

    public function editpage($id){
        $page = Page::findOrFail($id);
        return view('editpage')->with('page',$page);
    }

    public function updateglobals(Request $request){
        $this->validate($request, [
            'contact_mail'=>'required',
            'google_key' => 'required',
            'fb_key' => 'required',
        ]);

        $contact_mail =  AppWideKey::findOrFail(1);
        $contact_mail->value = $request->input('contact_mail');
        $contact_mail->save();

        $google_key =  AppWideKey::findOrFail(2);
        $google_key->value = $request->input('google_key');
        $google_key->save();

        $fb_key =  AppWideKey::findOrFail(3);
        $fb_key->value = $request->input('fb_key');
        $fb_key->save();

        return redirect('admin')->with('success','updated succesfully');
    }

    public function updatepage(Request $request){
        $this->validate($request, [
            'id'=>'required',
            'title' => 'required',
            'body' => 'required',
            'meta_title'=>'required',
            'meta_description'=>'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        $id = $request->input('id');
        $page = Page::findOrFail($id);


        if($request->hasFile('cover_image')){

            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('cover_image')->getClientOriginalExtension();

            $fileNameToStore= $filename.'_'.time().'.'.$extension;

            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }

        $page->title = $request->input('title');
        $page->content = $request->input('body');
        $page->meta_title = $request->input('meta_title');
        $page->meta_description = $request->input('meta_description');
        if($request->hasFile('cover_image')){
            $page->cover_image = $fileNameToStore;
        }
        if(empty($request->input('no_index'))){
            $page->no_index = 0;
        }else{
            $page->no_index = 1;
        }
        $page->save();


        return redirect('admin')->with('success','Page updated succesfully');
    }
}
