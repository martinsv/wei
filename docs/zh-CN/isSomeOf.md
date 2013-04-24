[isSomeOf()](http://twinh.github.io/widget/api/isSomeOf)
========================================================

检查数据是否通过指定数量规则的验证

### 
```php
bool isSomeOf( $input [, $rules [, $atLeast ] ] )
```

##### 参数
* **$input** `mixed` 待验证的数据
* **$rules** `array` 验证规则数组,数组的键名是规则名称,数组的值是验证规则的配置选项
* **$atLeast** `int` 至少要有多少条规则通过才算验证通过


##### 错误信息
| **名称**              | **信息**                                                       | 
|-----------------------|----------------------------------------------------------------|
| `atLeast`             | %name%至少需要满足以下%count%条规则中的%left%条                |
| `notString`           | %name%必须是字符串                                             |
| `negative`            | %name%不合法                                                   |


##### 代码范例
检查数据符合"数字,长度小于5,邮箱"这三条中至少两条
```php
<?php

$rules = array(
    'digit' => true,
    'maxLength' => 5,
    'email' => true
);
if ($widget->isSomeOf('abc', $rules)) {
    echo 'Yes';
} else {
    echo 'No';
}
```
##### 运行结果
```php
'Yes'
```