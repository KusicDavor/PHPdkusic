<?php
namespace Classes;
trait TimestampCreated {
    public static function setTimestamp($model) {
            $model->created_at = $model->freshTimestamp();
            $model->updated_at = $model->freshTimestamp();

    protected function freshTimestamp() {
        return date('Y-m-d H:i:s');
    }
}