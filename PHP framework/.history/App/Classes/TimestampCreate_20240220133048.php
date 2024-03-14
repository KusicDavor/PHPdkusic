<?php
namespace Classes;
trait TimestampCreate {
    public static function setTimestamp($model) {
            $model->attributes['created_at'] = date('Y-m-d H:i:s');
            $model->attributes['updated_at'] = date('Y-m-d H:i:s');
    }

    public function freshTimestamp() {
        return date('Y-m-d H:i:s');
    }
}