<?php
namespace Classes;
trait TimestampDelete {
    public static function setTimestamp($model) {
        $model->attributes['created_at'] = $model->freshTimestamp();
        $model->attributes['updated_at'] = $model->freshTimestamp();
    }


    protected function freshTimestamp() {
        return date('Y-m-d H:i:s');
    }
}