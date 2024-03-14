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
        $cacheToken = 'jwt_token_' . md5($apiKey);
        $apiKey = "cacheToken";
        $cacheItem = $this->cache->getItem($apiKe);
        $cacheItem->set($cacheToken);
        $this->cache->save($cacheItem);
    }
}
