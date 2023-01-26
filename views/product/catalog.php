<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Каталог товаров';
$this->params['breadcrumbs'][] = $this->title;
echo "<h1>Каталог товаров</h1>
 
  <div class='gty'>
  <h2>Сортировка</h2>
  <div>
  <p><a href='https://pr-hahilev.сделай.site/product/catalog?sort=price'>↑</a>По цене<a href='https://pr-hahilev.сделай.site/product/catalog?sort=-price'>↓</a></p>
    <p><a href='https://pr-hahilev.сделай.site/product/catalog?sort=name'>↑</a>По имени<a href='https://pr-hahilev.сделай.site/product/catalog?sort=-name'>↓</a></p>
    <p><a href='https://pr-hahilev.сделай.site/product/catalog?sort=country'>↑</a>По стране<a href='https://pr-hahilev.сделай.site/product/catalog?sort=-country'>↓</a></p>
  </div>
  
  </div>;"?>

<?php $products=$dataProvider->getModels();
echo "<div class='d-flex flex-row flex-wrap justify-content-start border border-1 border-info align-items-end'>";
foreach ($products as $product)
{
    if ($product->count>0)
    {
        echo "<div class='card m-1' style='width: 22%; min-width: 300px;'>
            <a href='/product/view?id={$product->id}'><img src='{$product->photo}'class='card-img-top' style='max-height: 300px;' alt='image'></a>
        <div class='card-body'>
        <h5 class='card-title'>{$product->name}</h5>
        <p class='text-danger'>{$product->price} руб</p>";
        echo (Yii::$app->user->isGuest ? "<a href='/product/view?id={$product->id}' class='btn btn-primary'>Просмотр товара</a>": "<p onclick='add_product({$product->id},1)' class='btn btn-primary'>Добавить в корзину</p>");
        echo "</div>
        </div>";
    }
}
echo "</div>";
?>
<div class="product-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>




</div>