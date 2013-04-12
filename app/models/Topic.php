<?php

class Topic extends BaseArray
{
    public function getCategory() {
        return App::make('CategoryRepository')->findById($this->category_id);
    }

    public function getPosts() {
        return App::make('PostRepository')->findAllByTopic($this);
    }
}
