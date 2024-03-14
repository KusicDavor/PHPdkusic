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

    public function saveTokenToCache(string $key, $value, int $ttl = null): void
    {
        // Create a cache item
        $cacheItem = $this->cache->getItem($key);

        // Set the value for the cache item
        $cacheItem->set($value);

        // Set the expiration time for the cache item (if provided)
        if ($ttl !== null) {
            $cacheItem->expiresAfter($ttl);
        }

        // Save the cache item
        $this->cache->save($cacheItem);
    }
}
