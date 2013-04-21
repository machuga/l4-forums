<?php

class CategoriesController extends BaseController
{
    public function __construct(CategoryRepository $categoryRepo)
    {
        $this->categoryRepository = $categoryRepo;
    }

    public function index()
    {
        $categories = $this->categoryRepository->findAll();
        $this->layout->content = View::make('categories.index', compact('categories'));
    }

    public function show($id)
    {
        $category = $this->categoryRepository->findById($id);
        $this->layout->content = View::make('categories.show', compact('category'));
    }
}
