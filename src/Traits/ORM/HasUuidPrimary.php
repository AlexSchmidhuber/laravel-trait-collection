<?php

namespace AlexSchmidhuber\LaravelTraitCollection\Traits\ORM;

use Webpatser\Uuid\Uuid;
/**
 *
 */
trait HasUuidPrimary
{
    public static function bootHasUuidPrimary()
    {
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Uuid::generate()->__toString();
        });
    }
}
