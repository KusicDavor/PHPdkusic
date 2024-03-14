<?php

namespace App\Security;

use Symfony\Component\Cache\Adapter\AdapterInterface;
use Symfony\Component\Cache\CacheItem;

class JwtTokenManager
{
    private $cache;

    public function __construct(AdapterInterface $cache)
    {
        $this->cache = $cache;
    }

    public function saveTokenToCache(string $token): void
    {
        // Store the token in the cache with a unique key
        $cacheKey = 'jwt_token_' . md5($token);
        $cacheItem = new CacheItem
        $this->cache->save($cacheKey);
    }
}
