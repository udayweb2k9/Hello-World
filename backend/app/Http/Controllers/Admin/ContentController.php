<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use App\Content;
use Redirect;

class ContentController extends Controller
{ 

    public function list()
    {
        $content = Content::where('status',1)->where('deleted',0)->orderBy('id','DESC')->get();

        $arr=[];
        foreach($content as $details)
        {
            if($details->image=='')
            {
                $image_path = '<img src="'.url('no-image.png').'" class="img-fluid" weidth="100px" />';
            }
            else
            {
                $image_path = '<img src="'.url('images/'.$details->image).'" class="img-fluid" />';
            }
            $arr[]=[
                'heading'=>$details->heading,
                'description'=>$details->description,
                'image_path'=>$image_path,
            ];
        }
        //dd($arr);
        return view('admin.content.list',['data'=>$arr]);   
    }

    public function add()
    {
        return view('admin.content.add');   
    }

    public function store(Request $request)
    {        
        $this->validate($request,[
            'heading_image'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
       
        $input = $request->all();
        $heading = $input['heading'];
        $heading_image = $input['heading_image'];
        $description = $input['description'];
        
        if($request->hasFile('heading_image'))
        {
            $heading_image = time().'.'.$request->file('heading_image')->getClientOriginalExtension();
            $request->file('heading_image')->move(public_path('images'), $heading_image);
        }

        $content = new Content();
        $content->heading=$heading;
        $content->description=$description;
        $content->image=$heading_image;
        $content->save();

        return Redirect::to('admin/content/list')->with('message', 'success');
    }
}
