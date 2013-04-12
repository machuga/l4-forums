<?php

class BaseArray
{
    protected $attributes = [];
    protected $relations = [];

    public function __construct($attributes = [])
    {
        $this->attributes = $attributes;
    }

    public function __get($key)
    {
        $exists = isset($this->attributes[$key]);
        if (! $exists) {
            $relationExists = isset($this->relations[$key]);
            if (! $relationExists) {
                $method = 'get'.ucfirst($key);
                if (method_exists($this, $method)) {
                    $this->relations[$key] = $this->$method();
                }
            }
            return $this->relations[$key];
        }
        return $this->attributes[$key];
    }

    public function __set($key, $val)
    {
        return $this->attributes[$key] = $val;
    }
}
