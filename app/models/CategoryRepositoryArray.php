<?php

class CategoryRepositoryArray implements CategoryRepository
{
    public $categories = [];

    public function __construct()
    {
        $this->categories = [
            new Category(['id' => 1, 'name' => 'General']),
            new Category(['id' => 2, 'name' => 'Help']),
            new Category(['id' => 3, 'name' => 'Development']),
            new Category(['id' => 4, 'name' => 'Testing']),
            new Category(['id' => 5, 'name' => 'Topic1']),
            new Category(['id' => 6, 'name' => 'Topic2']),
            new Category(['id' => 7, 'name' => 'Topic3'])
        ];
    }

    public function findById($id)
    {
        $results = array_filter($this->categories, function($cat) use ($id) {
            return $cat->id === $id;
        });

        return $results ? $results[0] : null;
    }

    public function findByName($name)
    {
        $results = array_filter($this->categories, function($cat) use ($name) {
            return $cat->name === $name;
        });

        return $results ? $results[0] : null;
    }

    public function findAll()
    {
        return $this->categories;
    }

    public function findTree()
    {
        $list = [];
        foreach($this->findAll() as $cat) {
            ! isset($list[$cat->id]) && ! $cat->parent_id && $list[$cat->id] = $cat;
            isset($list[$cat->parent_id]) && $list[$cat->parent_id]->subcategories[] = $cat;
        }
        return $list;
    }

    public function insert(Category $category)
    {
    }

    public function update(Category $category)
    {
    }

    public function delete(Category $category)
    {
    }

}
