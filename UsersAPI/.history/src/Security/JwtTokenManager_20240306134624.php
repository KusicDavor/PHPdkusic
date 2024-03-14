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
        $cacheToken = 'jwt_token_' . md5($apiKey);
        $apiKey = "apiKey";
        $cacheItem = $this->cache->getItem($apiKey);
        $cacheItem->set($cacheToken);
        $this->cache->save($cacheItem);
    }
}
