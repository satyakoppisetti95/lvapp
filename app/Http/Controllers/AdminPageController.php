<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            'meta_description'=>'required'
        ]);

        $id = $request->input('id');
        $page = Page::find($id);

        $page->title = $request->input('title');
        $page->content = $request->input('body');
        $page->meta_title = $request->input('meta_title');
        $page->meta_description = $request->input('meta_description');
        if(empty($request->input('no_index'))){
            $page->no_index = 0;
        }else{
            $page->no_index = 1;
        }
        $page->save();


        return redirect('admin')->with('success','Page updated succesfully');
    }
}
