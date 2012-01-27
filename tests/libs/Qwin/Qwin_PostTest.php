<?php
require_once dirname(__FILE__) . '/../../../libs/Qwin.php';
require_once dirname(__FILE__).'/../../../libs/Qwin/Post.php';

/**
 * Test class for Qwin_Post.
 * Generated by PHPUnit on 2012-01-18 at 08:07:24.
 */
class Qwin_PostTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Qwin_Post
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = Qwin::getInstance()->post;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Qwin_Post::call
     */
    public function testCall()
    {
        $name = $this->object->call('name');
        $source = isset($_POST['name']) ? $_POST['name'] : null;

        $this->assertEquals($name->source, $source);

        $default = 'default';
        $name2 = $this->object->call('name', $default);
        $source = isset($_POST['name']) ? $_POST['name'] : $default;

        $this->assertEquals($name2->source, $default);
    }
}