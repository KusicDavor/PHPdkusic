<?php
namespace Classes;
use Database\Connection;
use DateTime;
use DateTimeZone;
trait TimestampDelete {
    public static function softDelete($model) {
        $model->attributes['deleted_at'] = (new DateTime('now', new DateTimeZone('')))->format('Y-m-d H:i:s');
    }
}