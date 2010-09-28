<?php
/**
 * Connection
 *
 * Copyright (c) 2008-2010 Twin Huang. All rights reserved.
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
 * @package     Qwin
 * @subpackage  Padb
 * @author      Twin Huang <twinh@yahoo.cn>
 * @copyright   Twin Huang
 * @license     http://www.opensource.org/licenses/apache2.0.php Apache License
 * @version     $Id$
 * @since       2010-09-24 19:40:06
 */

class Qwin_Padb_Connection
{
    protected $_root;

    protected $_database;

    protected $_isConnect = false;

    protected $_charset;

    public function __construct($rootPath, $username = null, $password = null)
    {
        $rootPath = 'E:\Work\Website\padb';
        $this->_root = $rootPath;
        if(is_dir($rootPath . '/padb'))
        {
            $this->_isConnect = true;
            // 验证用户是否存在
            $userFile = $rootPath . '/padb/user.php';
            if(file_exists($userFile))
            {
                $user = require_once $userFile;
                if(isset($user[$username]) && $user[$username] == $password)
                {
                    return true;
                }
                throw new Qwin_Padb_Connection_Exception('Can not find the user "' . $username . '" or the password is not correct.');
            }
            throw new Qwin_Padb_Connection_Exception('The user table is not exists.');
        }
        throw new Qwin_Padb_Connection_Exception('The path is not available.');
    }

    /**
     * 选择一个数据库
     *
     * @param string $database
     * @return object 当前对象
     */
    public function selectDatabase($database)
    {
        if(is_dir($this->_root . '/' . $database))
        {
            $this->_database = $database;
            return $this;
        }
        throw new Qwin_Padb_Connection_Exception('The database is not exists.');
    }

    public function call($set)
    {
        $set[0][0] = $this;
        $function = array_shift($set);
        return call_user_func_array($function, $set);
    }

    /**
     * 设置字符类型
     *
     * @param string $charset 字符类型
     * @return object 当前对象
     */
    public function setCharset($charset)
    {
        $this->_charset = $charset;
        return $this;
    }

    /**
     * 获取字符类型
     *
     * @return 字符类型
     */
    public function getCharset()
    {
        return $this->_charset;
    }

    public function getRoot()
    {
        return $this->_root;
    }

    public function isConnect()
    {
        return $this->_isConnect;
    }

    public function connect()
    {

    }

    public function close()
    {

    }
}
