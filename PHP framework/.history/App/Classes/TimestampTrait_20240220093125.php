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

    public function getCreatedAtColumn() {
        return 'created_at';
    }

    public function getUpdatedAtColumn() {
        return 'updated_at';
    }

     protected function freshTimestamp() {
        return date('Y-m-d H:i:s');
    }
}