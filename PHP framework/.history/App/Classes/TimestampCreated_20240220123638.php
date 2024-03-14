<?php
namespace Classes;
trait TimestampCreated {
    public static function setTimestamp() {
            $model->created_at = $model->freshTimestamp();
            $model->updated_at = $model->freshTimestamp();

        static::updating(function ($model) {
            $model->updated_at = $model->freshTimestamp();
        });
    }
    protected function freshTimestamp() {
        return date('Y-m-d H:i:s');
    }
}