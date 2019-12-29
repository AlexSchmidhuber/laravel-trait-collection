<?php

namespace AlexSchmidhuber\Traits\General;

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
