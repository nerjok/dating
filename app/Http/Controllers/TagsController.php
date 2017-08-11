<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tag;

class TagsController extends Controller
{

          public function __construct()
    {


        $this->middleware('admin')->except('index', 'show');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Tag $tag = null)
    {


       $articles =  $tag->articles()->paginate(5);


          return view('article.all', compact('articles'));

    }


    /**
     *
     * creating a tag
     */
     public function create()
     {

        return view('tags.form', compact('tag'));
     }

     /**
      * @param  injection of objects model and request
      *
      * @param redirects back
      */
      public function store(Tag $tag, Request $request)
      {

                $this->validate($request, [
                 
                 'tagname' => 'required|string|max:60',
                ]);


          $tag->name = $request->input('tagname');

          $tag->save();

          return redirect()->back();
      }


    /**
     *
     * edit a tag
     */
     public function edit(Tag $tag = null)
     {
        $tag2 = $tag;

        $tagList = Tag::paginate(10);

        return view('tags.edit', compact('tag2', 'tagList'));
     }

     /**
      * @param tags name
      *
      */
      public function destroy(Tag $tag){

        $tag->delete();

        return redirect()->back();

      }


     /**
      * @param  injection of objects model and request
      *
      * @param redirects back
      */
      public function update(Tag $tag, Request $request)
      {

                $this->validate($request, [
                 
                 'tagname' => 'required|string|max:60',
                ]);


          $tag->name = $request->input('tagname');

          $tag->save();

          return redirect('tag/edit');
      }
}
