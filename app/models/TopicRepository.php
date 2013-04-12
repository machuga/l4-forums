<?php

interface TopicRepository
{
    public function findById($id);
    public function findByName($name);
    public function findAll();
    public function findAllByCategory(Category $category);
    public function insert(Topic $post);
    public function update(Topic $post);
    public function delete(Topic $post);
}
