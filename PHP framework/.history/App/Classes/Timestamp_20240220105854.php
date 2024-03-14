<?php
namespace Classes;
use Database\Connection;
trait Timestamp {
    public static function setTimestamps() {
        created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');
    }
}