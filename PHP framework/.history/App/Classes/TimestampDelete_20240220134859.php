<?php
namespace Classes;
use Database\Connection;
trait TimestampDelete {
    public function softDelete() {
        echo "tusam"
        $this->attributes['deleted_at'] = date('Y-m-d H:i:s');
    }
}