X Yii Swipebox Extension
========================

Simple extension for Yii, which implements great jQuery lightbox called [Swipebox](http://brutaldesign.github.io/swipebox/) into Yii. Implementation is inspired by [jqPrettyPhoto](http://www.yiiframework.com/extension/jqprettyphoto/).

Sample use example
------------------

In `protected/config/main.php`
```php
  'import' => array(
    ...
    'ext.XSwipebox.XSwipebox',
    ...
  ),
```

In your view file:
```php
XSwipebox::add('.gallery a');
```
