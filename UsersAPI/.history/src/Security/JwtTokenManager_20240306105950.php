<?php

namespace App\Security;

use Doctrine\Common\Cache\Psr6\CacheItem;
use Symfony\Component\Cache\Adapter\AdapterInterface;

class JwtTokenManager
{
    // private $cache;

    // public function __construct(AdapterInterface $cache)
    // {
    //     $this->cache = $cache;
    // }

    // public function saveTokenToCache(string $token): void
    // {
    //     // Store the token in the cache with a unique key
    //     $cacheToken = 'jwt_token_' . md5($token);
    //     $cacheItem = new CacheItem($cacheToken, $token, true);
    //     $this->cache->save($cacheItem);
    // }
}
