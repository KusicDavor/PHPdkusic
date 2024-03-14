<?php
namespace Classes;
use Database\Connection;
trait TimestampDelete {
    public function softDelete() {
        echo "tu"
        $this->attributes['deleted_at'] = date('Y-m-d H:i:s');
    }
}