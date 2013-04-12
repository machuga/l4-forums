<?php

class TopicRepositoryArray implements TopicRepository
{
    public $topics = [];

    public function __construct()
    {
        $this->topics = [
            new Topic(['id' => 1, 'category_id' => 1, 'name' => 'I need help']),
            new Topic(['id' => 2, 'category_id' => 1, 'name' => 'Rum is Awesome!']),
            new Topic(['id' => 3, 'category_id' => 2, 'name' => 'I can haz Code?']),
            new Topic(['id' => 4, 'category_id' => 2, 'name' => 'What is DI?']),
            new Topic(['id' => 5, 'category_id' => 2, 'name' => 'What is this?']),
            new Topic(['id' => 6, 'category_id' => 3, 'name' => 'No']),
            new Topic(['id' => 7, 'category_id' => 3, 'name' => 'Yes'])
        ];
    }

    public function findById($id)
    {
        $results = array_filter($this->topics, function($topic) use ($id) {
            return $topic->id === $id;
        });

        return $results ? $results[0] : null;
    }

    public function findByName($name)
    {
        $results = array_filter($this->topics, function($topic) use ($name) {
            return $topic->name === $name;
        });

        return $results ? $results[0] : null;
    }

    public function findAllByCategory(Category $category)
    {
        $results = array_filter($this->topics, function($topic) use ($category) {
            return $topic->category_id === $category->id;
        });

        return $results;
    }

    public function findAll()
    {
        return $this->topics;
    }

    public function findTree()
    {
        $list = [];
        foreach($this->findAll() as $topic) {
            ! isset($list[$topic->id]) && ! $topic->parent_id && $list[$topic->id] = $topic;
            isset($list[$topic->parent_id]) && $list[$topic->parent_id]->topics[] = $topic;
        }
        return $list;
    }

    public function insert(Topic $topic)
    {
    }

    public function update(Topic $topic)
    {
    }

    public function delete(Topic $topic)
    {
    }

}
