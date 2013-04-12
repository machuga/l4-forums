<?php

class Post extends BaseArray
{
    public $topic;

    public function getTopic() {
        return App::make('TopicRepository')->findById($this->topic_id);
    }
}
