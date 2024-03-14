<?php
namespace Classes;
use Database\Connection;
trait TimestampDelete {
    public static function softDelete($model) {
        $model->attributes['deleted_at'] = date('Y-m-d H:i:s');
    }
}