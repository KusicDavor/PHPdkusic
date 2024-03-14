<?php

namespace App\Security;

use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class JwtTokenManager
{
    private $cache;

    public function __construct(FilesystemAdapter $cache)
    {
        $this->cache = $cache;
    }

    public function saveTokenToCache(string $apiKey): void
    {
        // Create a cache item
        $cacheItem = $this->cache->getItem("apiKey");
        $cacheItem->set($apiKey);

        // Save the cache item
        $this->cache->save($cacheItem);
    }
}
