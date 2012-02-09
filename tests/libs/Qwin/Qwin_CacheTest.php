<?php
ob_start();
require_once dirname(__FILE__) . '/../../../libs/Qwin.php';

/**
 * Test class for Qwin_Cache.
 * Generated by PHPUnit on 2012-01-18 at 09:09:49.
 */
class Qwin_CacheTest extends PHPUnit_Framework_TestCase {

    /**
     * @var Qwin_Cache
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     * @covers Qwin_Cache::__construct
     */
    protected function setUp() {
        $this->object = Qwin::getInstance()->cache;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {

    }

    public static function tearDownAfterClass()
    {
        Qwin::getInstance()->cache->clean();
    }

    /**
     * @covers Qwin_Cache::setDirOption
     */
    public function testGetDirOption()
    {
        $widget = $this->object;

        $newDir = $widget->option('dir') . DIRECTORY_SEPARATOR . 'newDir';

        $widget->option('dir', $newDir);

        $this->assertFileExists($newDir);

        /*ob_start();

        $widget->error->option(array(
            'exit' => false,
            'error' => false,
        ));

        $this->setExpectedException('ErrorException');

        // how about linux ?
        $widget->setDirOption('./cache/|');

        $output = ob_get_contents();
        $output && ob_end_clean();

        $this->assertContains('Failed to creat directory: ', $output);*/
    }

    /**
     * @covers Qwin_Cache::call
     */
    public function testCall() {
        $widget = $this->object;

        $widget->cache('test', __METHOD__);

        $this->assertEquals(__METHOD__, $widget->cache('test'));
    }

    /**
     * @covers Qwin_Cache::add
     */
    public function testAdd() {
        $widget = $this->object;

        $widget->remove('test');

        $widget->add('test', __METHOD__);

        $this->assertEquals(__METHOD__, $widget->get('test'));

        $this->assertFalse($widget->add('test', 'the other test'), 'cache "test" is exits');
    }

    /**
     * @covers Qwin_Cache::get
     */
    public function testGet() {
        $widget = $this->object;

        $widget->set('test', __METHOD__);

        $this->assertEquals(__METHOD__, $widget->get('test'), 'get known cache');

        $widget->remove('test');

        $this->assertFalse($widget->get('test'), 'cache has been removed');

        $widget->set('test', __METHOD__, -1);

        $this->assertFalse($widget->get('test'), 'cache is expired');
    }

    /**
     * @covers Qwin_Cache::set
     */
    public function testSet() {
        $widget = $this->object;

        $widget->set('test', __METHOD__);

        $this->assertEquals(__METHOD__, $widget->get('test'));
    }

    /**
     * @covers Qwin_Cache::replace
     */
    public function testReplace() {
        $widget = $this->object;

        $widget->set('test', __METHOD__);

        $widget->replace('test', __CLASS__);

        $this->assertEquals(__CLASS__, $widget->get('test'), 'cache replaced');

        $widget->remove('test');

        $widget->replace('test', __CLASS__);

        $this->assertFalse($widget->get('test'), 'cache not found');
    }

    /**
     * @covers Qwin_Cache::remove
     */
    public function testRemove() {
        $widget = $this->object;

        $widget->set('test', __METHOD__);

        $widget->remove('test');

        $this->assertEquals(null, $widget->get('test'));

        $this->assertFalse($widget->remove('test'), 'cache not found');
    }

    /**
     * @covers Qwin_Cache::isExpired
     */
    public function testIsExpired() {
        $widget = $this->object;

        // set expired after 1 second
        $widget->set('test', __METHOD__, 1);

        sleep(2);

        $this->assertTrue($widget->isExpired('test'));

        // never expired
        $widget->set('test', __METHOD__);

        $this->assertFalse($widget->isExpired('test'));
    }

    /**
     * @covers Qwin_Cache::getFile
     */
    public function testGetFile() {
        $widget = $this->object;

        $widget->set('test', __METHOD__);

        $file = $widget->getFile('test');

        $this->assertFileExists($file);
    }

    /**
     * @covers Qwin_Cache::clean
     * @covers Qwin_Cache::_clean
     */
    public function testClean()
    {
        $widget = $this->object;

        $widget->clean();

        $this->assertFileNotExists($widget->option('dir'), 'directory not found');

        // rebuild directory
        $widget->setDirOption($widget->option('dir'));
    }
}
