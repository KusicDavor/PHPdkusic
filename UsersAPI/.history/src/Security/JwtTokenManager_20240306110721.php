<?php

namespace App\Security;

use Psr\Cache\CacheItemPoolInterface;
use Symfony\Component\Cache\CacheItem;

class JwtTokenManager
{
    private $cache;

    public function __construct(CacheItemPoolInterface $cache)
    {
        $this->cache = $cache;
    }

    public function saveTokenToCache(string $token): void
    {
        // Store the token in the cache with a unique key
        $cacheToken = 'jwt_token_' . md5($token);
        $cacheItem = new CacheItem();
        $cacheItem->set($cacheToken);
        $this->cache->save($cacheItem);
    }
}
