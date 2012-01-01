<?php
/**
 * Qwin Framework
 *
 * Copyright (c) 2008-2011 Twin Huang. All rights reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * @author      Twin Huang <twinh@yahoo.cn>
 * @copyright   Twin Huang
 * @license     http://www.opensource.org/licenses/apache2.0.php Apache License
 * @version     $Id$
 */

/**
 * Session
 * 
 * @package     Qwin
 * @subpackage  Widget
 * @license     http://www.opensource.org/licenses/apache2.0.php Apache License
 * @author      Twin Huang <twinh@yahoo.cn>
 * @since       2010-04-18 11:50:10
 * @todo        缩减重复代码
 * @todo        通过Qwin_Request获取的值,为原生态,通过Qwin_Get等获取的值为对象?
 */
class Qwin_Session extends Qwin_Widget implements ArrayAccess
{
    /**
     * 当前的命名空间
     * @var string
     */
    private $_namespace;

    /**
     * @var array           选项
     *
     *      -- namespace    默认命名空间
     *
     *      -- limiter      见session_cache_limiter
     *
     *      -- expire       见expire
     */
    public $options = array(
        'namespace' => 'default',
        'limiter'   => 'private_no_expire, must-revalidate',
        'expire'    => 86400,
    );

    public function __construct(array $options = null)
    {
        $this->options = (array)$options + $this->options;
        if(!session_id()) {
            session_cache_limiter($this->options['limiter']);
            session_cache_expire($this->options['expire']);
            session_start();
        }
        // 命名空间对于每个项目都是唯一的
        // TODO $_SERVER['SCRIPT_FILENAME']对于不同项目不能保证100%唯一,是否有更好的标识
        if (!$this->options['namespace']) {
            $this->options['namespace'] = md5(dirname($_SERVER['SCRIPT_FILENAME']));
        }
        $this->setNamespace($this->options['namespace']);
    }

    /**
     * 设置一个命名空间
     *
     * @param string $namespace
     */
    public function setNamespace($namespace)
    {
        $this->_namespace = $namespace;
    }

    /**
     * 在当前命名空间设置一个会话
     * @param string $name
     * @param mixed $value
     * @return object
     */
    public function set($name, $value)
    {
        $_SESSION[$this->_namespace][$name] = $value;
        return $this;
    }

    /**
     * 获取当前命名空间的一个会话
     * @param string $name
     * @return mixed 会话的值
     */
    public function get($name)
    {
        return isset($_SESSION[$this->_namespace][$name]) ?
               $_SESSION[$this->_namespace][$name] :
               null;
    }

    /**
     * 切换命名空间,如果不存在,则设置一个新的命名空间
     * 
     * @param string $namesapce
     * @return object
     */
    public function changeNamespace($namesapce)
    {
        if (isset($_SESSION[$namesapce])) {
            $this->_namespace = $namesapce;
        } else {
            $this->setNamespace($namespace);
        }
        return $this;
    }

    /**
     * 销毁当前或指定命名空间
     * @param string $namespace
     */
    public function destroy($namespace = null)
    {
        if (null != $namespace) {
            unset($_SESSION[$namespace]);
        } else {
            unset($_SESSION[$this->_namespace]);
        }
        //session_destroy();
    }

    /**
     * 获取一个会话值
     *
     * @param string $name 名称
     * @return mixed
     */
    public function  __get($name) {
        return $this->get($name);
    }

    /**
     * 设置一个会话值
     *
     * @param string $name 名称
     * @param mixed $value 值
     * @return Qwin_Session 当前对象
     */
    public function  __set($name, $value) {
        return $this->set($name, $value);
    }

    /**
     * 检查索引是否存在
     *
     * @param string $offset 索引
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($_SESSION[$this->_namespace][$offset]);
    }

    /**
     * 获取索引的数据
     *
     * @param string $offset 索引
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    /**
     * 设置索引的值
     *
     * @param string $offset 索引
     * @param mixed $value 值
     */
    public function offsetSet($offset, $value)
    {
        return $this->set($offset, $value);
    }

    /**
     * 销毁一个索引
     *
     * @param string $offset 索引的名称
     */
    public function offsetUnset($offset)
    {
        unset($_SESSION[$this->_namespace][$offset]);
    }
    
    /**
     * 删除由于微件注入的session
     * 
     * @todo session不存为属性,改为_data
     */
    public function __destruct()
    {
        $this->offsetUnset('invoker');
    }
}
