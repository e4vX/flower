<?php

/** @var yii\web\View $this */

use yii\bootstrap5\Carousel;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php

echo Carousel::widget([
    'items' => [
        // the item contains only the image
        '<img src="/web/productImage/1.jpg" width="1500" height="500"/>',
        // equivalent to the above
        ['content' => '<img src="/web/productImage/2.jpg" width="1500" height="500"/>'],
        // the item contains both the image and the caption
        [
            'content' => '<img src="/web/productImage/3.jpg" width="1500" height="500"/>',
            'caption' => '<h4>This is title</h4><p>This is the caption text</p>',
        ],
    ]
]);

?>
