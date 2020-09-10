<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Page;

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
        $pages = Page::all();
        return view('admin')->with('pages',$pages);
    }

    public function editpage($id){
        $page = Page::findOrFail($id);
        return view('editpage')->with('page',$page);
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

        // Handle File Upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
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
