<?php
namespace Classes;
trait TimestampDelete {
    public static function setTimestampDelete($model) {
        $model->attributes['deleted_at'] = $model->freshTimestamp();
    }

    protected function freshTimestamp() {
        return date('Y-m-d H:i:s');
    }
}