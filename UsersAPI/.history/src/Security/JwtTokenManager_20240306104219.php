<?php
// src/Security/JwtTokenManager.php

namespace App\Security;

use Symfony\Component\Cache\Adapter\AdapterInterface;

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
        $this->cache->set($cacheKey, $token);
    }
}
