<?php
namespace Classes;
trait TimestampCreated {
    public static function setTimestamp($model) {
        static::creating(function ($model) {
            $model->attributes['created_at'] = $model->freshTimestamp();
            $model->attributes['updated_at'] = $model->freshTimestamp();
        });

        static::updating(function ($model) {
            $model->attributes['updated_at'] = $model->freshTimestamp();
        });
    }

    public function freshTimestamp() {
        return date('Y-m-d H:i:s');
    }
}