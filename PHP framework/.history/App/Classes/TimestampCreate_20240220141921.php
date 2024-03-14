<?php
namespace Classes;
trait TimestampCreate {
    public static function setTimestamp($model) {
            $model->attributes['created_at'] = (new DateTime('now', new DateTimeZone('Europe/Zagreb')))->format('Y-m-d H:i:s');
            $model->attributes['updated_at'] = (new DateTime('now', new DateTimeZone('Europe/Zagreb')))->format('Y-m-d H:i:s');
    }

    public static function updateTimestamp($model) {
        $model->attributes['updated_at'] = (new DateTime('now', new DateTimeZone('Europe/Zagreb')))->format('Y-m-d H:i:s');
    }
}