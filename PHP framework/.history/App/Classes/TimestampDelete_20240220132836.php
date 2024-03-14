<?php
namespace Classes;
trait TimestampDelete {
    public static function setTimestampDelete($model) {
        $model->attributes['deleted_at'] = $model->freshTimestamp();
    }

    protected function freshTimestampDeleted() {
        return date('Y-m-d H:i:s');
    }
}