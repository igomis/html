<?php

namespace Styde\Html\FormModel;

trait HasAttributes
{
    public function __call($method, $params)
    {
        return $this->attr($method, isset($params[0]) ? $params[0] : true);
    }

    public function id($id)
    {
        return $this->attributes('id', $id);
    }

    public function classes($classes)
    {
        return $this->attributes('class', $classes);
    }

    public function attr($attributes, $value = true)
    {
        if (is_array($attributes)) {
            $this->attributes = array_merge($this->attributes, $attributes);
        } else {
            $this->attributes[$attributes] = $value;
        }

        $this->addRulesOfAttributes();

        return $this;
    }

    public function hasAttribute($name)
    {
        return in_array($name, $this->attributes);
    }

    public function attributes($attributes, $value = true)
    {
        return $this->attr($attributes, $value);
    }

}