<?php

namespace AlexSchmidhuber\LaravelTraitCollection\Traits\ORM;

trait HasJsonColumn
{

    public static function initializeHasJsonColumn()
    {
        $this->fillable[] = $this->setJsonColumn();
    }

    public function setJsonColumn()
    {
        return 'json';
    }

    public function get($key = null, $column = null)
    {
        if(is_null($column)) {
            $column = $this->setJsonColumn();
        }

        $dataStore = collect(json_decode($this->{$column}));

        if (is_null($key)) {
            return $dataStore;
        } else {
            return $dataStore->get($key);
        }
    }

    public function set(array $data, $column = null)
    {
        if(is_null($column)) {
            $column = $this->setJsonColumn();
        }

        $dataStore = is_null($this->get(null, $column)) ? [] : $this->get(null, $column)->toArray();

        $this->{$column} = json_encode(array_merge($dataStore, $data));
    }
}
