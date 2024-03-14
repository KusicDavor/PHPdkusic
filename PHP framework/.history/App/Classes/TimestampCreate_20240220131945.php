<?php
namespace Classes;
trait TimestampCreate {
    public static function setTimestamp($model) {
            $model->attributes['created_at'] = $model->freshTimestamp();
            $model->attributes['updated_at'] = $model->freshTimestamp();
    }

    public static function updateTimestamp($model) {
        $model->attributes['updated_at'] = $model->freshTimestamp();
}

    public function freshTimestamp() {
        return date('Y-m-d H:i:s');
    }
}