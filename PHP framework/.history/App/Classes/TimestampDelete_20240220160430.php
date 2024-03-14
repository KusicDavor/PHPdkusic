<?php
namespace Classes;
use DateTime;
use DateTimeZone;
trait TimestampDelete {
    public static function softDelete($model) {
        $model->attributes['deleted_at'] = (new DateTime('now', new DateTimeZone('Europe/Zagreb')))->format('Y-m-d H:i:s');
        echo $model->attributes['deleted_at'];
    }
}