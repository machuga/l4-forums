<?php

class PostRepositoryArray implements PostRepository
{
    public $posts = [];

    public function __construct()
    {
        $this->posts = [
            new Post(['id' => 1, 'topic_id' => 1, 'name' => 'Wat1', 'body' => 'Lorem Ipsum']),
            new Post(['id' => 2, 'topic_id' => 1, 'name' => 'Wat1', 'body' => 'Lorem Ipsum']),
            new Post(['id' => 3, 'topic_id' => 2, 'name' => 'Wat1', 'body' => 'Lorem Ipsum']),
            new Post(['id' => 4, 'topic_id' => 2, 'name' => 'Wat1', 'body' => 'Lorem Ipsum']),
            new Post(['id' => 5, 'topic_id' => 3, 'name' => 'What is this?', 'body' => 'Lorem Ipsum']),
            new Post(['id' => 6, 'topic_id' => 3, 'name' => 'No', 'body' => 'Lorem Ipsum']),
            new Post(['id' => 7, 'topic_id' => 3, 'name' => 'Yes', 'body' => 'Lorem Ipsum'])
        ];
    }

    public function findById($id)
    {
        $results = array_filter($this->posts, function($post) use ($id) {
            return $post->id === $id;
        });

        return $results ? $results[0] : null;
    }

    public function findAllByTopic(Topic $topic)
    {
        $results = array_filter($this->posts, function($post) use ($topic) {
            return $post->topic_id === $topic->id;
        });

        return $results;
    }

    public function findAll()
    {
        return $this->posts;
    }

    public function findTree()
    {
        $list = [];
        foreach($this->findAll() as $post) {
            ! isset($list[$post->id]) && ! $post->parent_id && $list[$post->id] = $post;
            isset($list[$post->parent_id]) && $list[$post->parent_id]->posts[] = $post;
        }
        return $list;
    }

    public function insert(Post $post)
    {
        $this->posts[] = $post;
    }

    public function update(Post $post)
    {
        foreach ($this->posts as $key => $postRecord) {
            if ($post->id === $postRecord->id) {
                $this->posts[$key] = $post;
            }
        }
    }

    public function delete(Post $post)
    {
        foreach ($this->posts as $key => $postRecord) {
            if ($post->id === $postRecord->id) {
                unset($this->posts[$key]);
            }
        }
    }

}
