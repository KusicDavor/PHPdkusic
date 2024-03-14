<?php

namespace App\Security;

use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Cache\CacheItem;

class JwtTokenManager
{
    private $cache;

    public function __construct(FilesystemAdapter $cache)
    {
        $this->cache = $cache;
    }


    public function saveTokenToCache(string $apiKey): void
    {
        $cacheItem = $this->cache->getItem("apiKey");
        $cacheItem->set($apiKey);
        $this->cache->save($cacheItem);
    }
}
