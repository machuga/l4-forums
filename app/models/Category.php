<?php

class Category extends BaseArray
{
    public function getTopics() {
        return App::make('TopicRepository')->findAllByCategory($this);
    }
}
