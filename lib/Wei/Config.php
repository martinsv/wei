<?php
/**
 * Wei Framework
 *
 * @copyright   Copyright (c) 2008-2013 Twin Huang
 * @license     http://opensource.org/licenses/mit-license.php MIT License
 */

namespace Wei;

/**
 * A service to manage service container configurations
 *
 * @author      Twin Huang <twinhuang@qq.com>
 */
class Config extends Base
{
    /**
     * Convert configuration data to JSON
     *
     * @param string $name The name of configuration item
     * @return string
     */
    public function toJson($name)
    {
        return json_encode($this->wei->getConfig($name));
    }

    /**
     * Convert configuration data to HTML select options
     *
     * @param string $name The name of configuration item
     * @return string
     */
    public function toOptions($name)
    {
        $html = '';
        foreach ($this->wei->getConfig($name) as $value => $text) {
            if (is_array($text)) {
                $html .= '<optgroup label="' . $value . '">';
                foreach ($text as $v => $t) {
                    $html .= '<option value="' . $v . '">' . $t . '</option>';
                }
                $html .= '</optgroup>';
            } else {
                $html .= '<option value="' . $value . '">' . $text . '</option>';
            }
        }
        return $html;
    }
}
