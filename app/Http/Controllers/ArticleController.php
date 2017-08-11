<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

use App\Http\Requests\ArtRequest;

class ArticleController extends Controller
{

    public function __construct()
    {


        $this->middleware('admin')->except('index', 'show');
    }


    /**
     * Show a newly created resource in storage.
     * 
     * 
     * @return paginated articles, with 200 charackers long
     */
    public function index()
    {

        $articles = Article::select(\DB::raw('substr(content, 1, 200) as content'), 'title', 'id')->paginate(5);

        return view('article.all', compact('articles'));
    }


    /**
     * @param null
     *
     * @return Articles to edit by specified user 
     */
    public function editAll()
    {



        $articles = Article::paginate(20);

        return view('article.editSelect', compact('articles'));
    }

    /**
     * The form to create article
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $tag = \App\Tag::all();


         return view('article.form', compact('tag'));
    }

    /**
     * Store the  article form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ArtRequest $request)
    {


       $article = new Article();

       $article->title = $request->input('title');

       $article->content = $request->input('content');

       $article->user_id = \Auth::user()->id;

       $article->save();

              $tags = $request->input('tag');

          

        if ($tags != null) $article->tags()->attach($tags);

       return redirect()->back();
    }



    /**
     * Display the specified article.
     *
     * @param  article injection
     * @return article
     */
    public function show(Article $article)
    {

        return view('article.single', compact('article'));
    }

    /**
     * Show the form for editing the specified Article.
     *
     * @param  \App\Article  $article
     * @return article fields to update
     */
    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return back to redirection form.
     */
    public function update(Article $article, ArtRequest $request)
    {
        $article->title = $request->input('title');

       $article->content = $request->input('content');

       $article->user_id = \Auth::user()->id;

       $article->save();

       return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->back();
    }
}
