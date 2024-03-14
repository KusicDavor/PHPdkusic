<?php

namespace App\Controller;

use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class CacheManager
{
    private $cache;

    public function __construct()
    {
        // Create a cache instance
        $this->cache = new FilesystemAdapter();
    }

    public function retrieveFromCache(string $key)
    {
        // Retrieve the value from the cache by key
        $item = $this->cache->getItem($key);

        // Check if the item exists in the cache
        if ($item->isHit()) {
            // Return the cached value
            return $item->get();
        } else {
            // Value not found in cache
            return null;
        }
    }
}
