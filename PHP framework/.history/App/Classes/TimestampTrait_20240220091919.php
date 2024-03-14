<?php
namespace Classes;
public static function bootTimestampable() {
    static::creating(function ($model) {
        $model->created_at = $model->freshTimestamp();
        $model->updated_at = $model->freshTimestamp();
    });