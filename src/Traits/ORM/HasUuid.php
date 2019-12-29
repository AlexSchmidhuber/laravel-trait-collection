<?php

namespace AlexSchmidhuber\LaravelTraitCollection\Traits\ORM;

use Webpatser\Uuid\Uuid;

/**
 *
 */
trait HasUuid
{
    public static function bootHasUuid()
    {
        static::creating(function ($model) {

            $modelArray = $model->toArray();

            // checking first if a uuid is already given
            $propertyExists = isset($modelArray['uuid']) ? $modelArray['uuid'] : null;
            $isUuidValid = $propertyExists ? Uuid::validate($model->uuid) : false;

            // if no valid uuid is given generate a new one
            if (!$isUuidValid) {
                $model->uuid = Uuid::generate(4)->__toString();
            }
        });
    }
}
