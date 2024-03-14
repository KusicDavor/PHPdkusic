<?php
namespace Classes;
use Database\Connection;
use DateTimeZone;
trait TimestampDelete {
    public static function softDelete($model) {
        $model->attributes['deleted_at'] = (new ('now', new DateTimeZone('YourTimeZone')))->format('Y-m-d H:i:s');
    }
}