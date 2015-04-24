<?php

class ArticleController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$articles = Article::all();

        // load the view and pass the nerds
        return View::make('articles.index')
            ->with('articles', $articles);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('articles.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'title'       => 'required',
            'content'      => 'required'            
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('articles/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $article = new Article;
            $article->title       = Input::get('title');
            $article->content      = Input::get('content');            
            $article->save();

            // redirect
            Session::flash('message', 'Successfully created article!');
            return Redirect::to('articles');
        }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$article = Article::find($id);
		return View::make('articles.show')
            ->with('article', $article);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// get the nerd
        $article = Article::find($id);

        // show the edit form and pass the nerd
        return View::make('articles.edit')
            ->with('article', $article);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'title'       => 'required',
            'content'      => 'required'            
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('articles/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $nerd = Article::find($id);
            $nerd->title = Input::get('title');
            $nerd->content  = Input::get('content');            
            $nerd->save();

            // redirect
            Session::flash('message', 'Successfully updated article!');
            return Redirect::to('articles');
        }
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// delete
        $article = Article::find($id);
        $article->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the article!');
        return Redirect::to('articles');
	}


}
