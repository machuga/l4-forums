<?php

interface CategoryRepository
{
    public function findById($id);
    public function findByName($name);
    public function findAll();
    public function findTree();
    public function insert(Category $category);
    public function update(Category $category);
    public function delete(Category $category);
}
