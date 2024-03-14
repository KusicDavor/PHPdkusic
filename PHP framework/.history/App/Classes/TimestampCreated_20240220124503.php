<?php
namespace Classes;
trait TimestampCreated {
    public static function setTimestamp() {
            $model->attributes['created_at'] = $model->freshTimestamp();
            $model->attributes['updated_at'] = $model->freshTimestamp();
    }

    public function freshTimestamp() {
        return date('Y-m-d H:i:s');
    }
}