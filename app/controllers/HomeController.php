<?php

class HomeController extends BaseController {

    protected $layout = 'layouts.application';

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |   Route::get('/', 'HomeController@showWelcome');
    |
     */

    public function __construct(CategoryRepository $categoryRepo, PostRepository $postRepo)
    {
        $this->categoryRepository = $categoryRepo;
        $this->postRepository = $postRepo;
    }

    public function showWelcome()
    {
        $categories = $this->categoryRepository->findAll();
        $this->layout->content = View::make('categories.index', compact('categories'));
    }

}
