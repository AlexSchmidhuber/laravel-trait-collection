<?php

namespace AlexSchmidhuber\Traits\General;

use Illuminate\Support\Collection;

trait HasDataStore
{

    public function getDataStore($key = null)
    {
        $dataStore = collect(json_decode($this->data_store));

        if (is_null($key)) {
            return $dataStore;
        } else {
            return $dataStore->get($key);
        }
    }

    public function setDataStore(array $data)
    {
        $dataStore = is_null($this->getDataStore()) ? [] : $this->getDataStore()->toArray();

        $this->data_store = json_encode(array_merge($dataStore, $data));
        $this->save();
    }
}
