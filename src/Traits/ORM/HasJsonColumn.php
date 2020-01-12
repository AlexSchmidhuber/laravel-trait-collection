<?php

namespace AlexSchmidhuber\LaravelTraitCollection\Traits\ORM;

trait HasJsonColumn
{

    public static function bootHasJsonColumn()
    {
        static::creating(function ($model) {
            $model->fillable[] = $model->setJsonColumn();
        });

        static::retrieved(function ($model) {
            $model->fillable[] = $model->setJsonColumn();
        });
    }

    public function setJsonColumn()
    {
        return 'json';
    }

    public function getJsonData($key = null, $column = null)
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

    public function setJsonData(array $data, $column = null)
    {
        if(is_null($column)) {
            $column = $this->setJsonColumn();
        }

        $dataStore = is_null($this->getJsonData(null, $column)) ? [] : $this->getJsonData(null, $column)->toArray();

        $this->{$column} = json_encode(array_merge($dataStore, $data));
    }
}
