<?php

class WY_Container implements ArrayAccess {
    protected $items = array();


    public function __construct (array $items = array()){
        $this->items = $items;
    }


    public function offsetSet($id, $value){
        $this->items[$id] = $value;
    }


    public function offsetGet($id){
        if (!array_key_exists($id, $this->items)) {
            throw new InvalidArgumentException(sprintf('Key "%s" is not defined.', $id));
        }

        $isFactory = is_object($this->items[$id]) && method_exists($this->items[$id], '__invoke');

        return $isFactory ? $this->items[$id]($this) : $this->items[$id];
    }


    public function offsetExists($id){
        return array_key_exists($id, $this->items);
    }


    public function offsetUnset($id){
        unset($this->items[$id]);
    }


    public static function share(Closure $callable){
        return function ($c) use ($callable) {
            static $object;

            if (null === $object) {
                $object = $callable($c);
            }

            return $object;
        };
    }


    public static function protect(Closure $callable){
        return function ($c) use ($callable) {
            return $callable;
        };
    }


    public function raw($id){
        if (!array_key_exists($id, $this->items)) {
            throw new InvalidArgumentException(sprintf('Key "%s" is not defined.', $id));
        }

        return $this->items[$id];
    }


    public function extend($id, Closure $callable){
        if (!array_key_exists($id, $this->items)) {
            throw new InvalidArgumentException(sprintf('Key "%s" is not defined.', $id));
        }

        $factory = $this->items[$id];

        if (!($factory instanceof Closure)) {
            throw new InvalidArgumentException(sprintf('Key "%s" does not contain an object definition.', $id));
        }

        return $this->items[$id] = function ($c) use ($callable, $factory) {
            return $callable($factory($c), $c);
        };
    }


    public function keys(){
        return array_keys($this->items);
    }
}