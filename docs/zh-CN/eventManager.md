    该微件文档还在紧急编写中,敬请期待!
[eventManager()](http://twinh.github.io/widget/api/eventManager)
================================================================

Trigger a event

### Trigger a event
```php
\Event\EventInterface eventManager($type, $args, $widget)
```

##### 参数
* **$type** `string` The name of event or a Event object
* **$args** `array` The arguments pass to the handle
* **$widget** `null|\WidgetInterface` If the widget contains the
                                    $type property, the event manager
                                    will trigger it too
