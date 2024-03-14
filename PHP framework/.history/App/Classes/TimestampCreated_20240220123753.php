<?php
namespace Classes;
trait TimestampCreated {
    public static function setTimestamp($model) {
        $model->attributes['id'] = $id;
            $model->created_at = $model->freshTimestamp();
            $model->updated_at = $model->freshTimestamp();
    }

    public function freshTimestamp() {
        return date('Y-m-d H:i:s');
    }
}