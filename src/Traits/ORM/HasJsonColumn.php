<?php

namespace AlexSchmidhuber\LaravelTraitCollection\Traits\ORM;

trait HasJsonColumn
{

    public function get($key = null, $column = 'json')
    {
        $dataStore = collect(json_decode($this->{$column}));

        if (is_null($key)) {
            return $dataStore;
        } else {
            return $dataStore->get($key);
        }
    }

    public function set(array $data, $column = 'json')
    {
        $dataStore = is_null($this->get(null, $column)) ? [] : $this->get(null, $column)->toArray();

        $this->{$column} = json_encode(array_merge($dataStore, $data));
    }
}
