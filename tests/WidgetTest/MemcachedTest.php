<?php

namespace WidgetTest;

class MemcachedTest extends CacheTestCase
{
    public function setUp()
    {
        if (!extension_loaded('memcached') || !class_exists('\Memcached')) {
            $this->markTestSkipped('The memcache extension is not loaded');
        }
        
        parent::setUp();
    }
    
    public function testGetAndSetObject()
    {
        $cache = $this->object;
        $memcached = $cache->getObject();
        
        $this->assertInstanceOf('\Memcached', $memcached);
        
        $cache->setObject($memcached);
        
        $this->assertInstanceOf('\Memcached', $cache->getObject());
    }
}
