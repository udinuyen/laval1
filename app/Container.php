<?php

namespace App;

class Container {

    // array for keeping the container bindings
    protected $bindings = [];

    // binds new data to the container
    public function bind($key, $value)
    {
        // bind the given value with the given key
        $this->bindings[$key] = $value;
    }

    // returns bound data from the container
    public function make($key)
    {
        if (isset($this->bindings[$key])) {
            // check if the bound data is a callback
            if (is_callable($this->bindings[$key])) {
                // if yes, call the callback and return the value
                return call_user_func($this->bindings[$key]);
            } else {
                // if not, return the value as it is
                return $this->bindings[$key];
            }
        }
    }

}
