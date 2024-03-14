<?php
namespace Classes;
trait TimestampDelete {
    public static function softDelete($model) {
        $model->attributes['deleted_at'] = date('Y-m-d H:i:s');
    }

    public function delete() {
        // Ovdje implementirajte logiku za brisanje objekta iz baze
    }
}