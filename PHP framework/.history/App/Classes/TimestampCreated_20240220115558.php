<?php
namespace Classes;
use Database\Connection;
trait TimestampCreated {
    protected $created = false;
    public static function bootTimestampable() {
        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
            $model->updated_at = $model->freshTimestamp();
        });

        static::updating(function ($model) {
            $model->updated_at = $model->freshTimestamp();
        });
    }
    protected function freshTimestamp() {
        return date('Y-m-d H:i:s');
    }
}