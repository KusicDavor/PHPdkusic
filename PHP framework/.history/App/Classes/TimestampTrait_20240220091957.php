<?php
namespace Classes;
trait TimestampTrait {
public static function bootTimestampable() {
    static::creating(function ($model) {
        $model->created_at = $model->freshTimestamp();
        $model->updated_at = $model->freshTimestamp();
    });
    static::updating(function ($model) {
            $model->updated_at = $model->freshTimestamp();
        });
    }
}