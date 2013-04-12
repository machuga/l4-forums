<?php

interface PostRepository
{
    public function findById($id);
    public function findAllByTopic(Topic $topic);
    public function findAll();
    public function findTree();
    public function insert(Post $post);
    public function update(Post $post);
    public function delete(Post $post);
}
