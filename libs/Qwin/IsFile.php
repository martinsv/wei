<?php
/**
 * Qwin Framework
 *
 * Copyright (c) 2008-2012 Twin Huang. All rights reserved.
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
 * IsFile
 * 
 * @package     Qwin
 * @subpackage  Qwin
 * @license     http://www.opensource.org/licenses/apache2.0.php Apache License
 * @author      Twin Huang <twinh@yahoo.cn>
 * @since       2011-10-02 00:37:35
 */
class Qwin_IsFile extends Qwin_Widget
{
    public function call()
    {
        if (!is_string($this->source)) {
            return false;
        }
        
        $file = &$this->source;
        
        // check directly if it's absolute path
        if ('/' == $file[0] || '\\' == $file[0] || ':' == $file[1]) {
            if (is_file($file)) {
                return true;
            }
        }

        // check if in include path
        foreach (explode(PATH_SEPARATOR, ini_get('include_path')) as $path) {
            $full = rtrim($path, '\\/') . DIRECTORY_SEPARATOR . $file;
            if (is_file($full)) {
                return true;
            }
        }
        
        // not found
        return false;
    }
}
