<?php

namespace AlexSchmidhuber\Traits\General;

use Illuminate\Support\Facades\DB;

trait HasEnum
{
    /**
     * returns ENUM options of the specified field
     * https://stackoverflow.com/questions/26991502/get-enum-options-in-laravels-eloquent
     *
     * @param string $field Table field
     *
     * @return array
     */
    public static function getEnumOptions($field)
    {
        $field = collect(DB::connection(self::getConnectionNameForEnumOptions())
            ->select(DB::raw("SHOW COLUMNS FROM " . self::getTableName() . " WHERE Field = '$field'")))->first();

        preg_match('/^enum\((.*)\)$/', $field->Type, $matches);

        $options = [];
        foreach (explode(',', $matches[1]) as $option) {
            $options[] = trim($option, "'");
        }

        return $options;
    }

    // https://github.com/laravel/framework/issues/1436#issuecomment-53381031
    private static function getTableName()
    {
        return ((new self)->getTable());
    }

    // https://github.com/laravel/framework/issues/1436#issuecomment-53381031
    private static function getConnectionNameForEnumOptions()
    {
        return ((new self)->getConnectionName());
    }
}
