<?php


use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'photo',
            'country',
            ['attribute'=>'Категория', 'value'=> function($data){return
                $data->getCategory()->One()->name_category;}],
            'name',
            ['attribute'=>'Фото', 'format'=>'html',
                'value'=>function($data){return"<img src='{$data->photo}' alt='photo'
style='width: 70px;'>";}],
            //'color',
            //'time',
            //'count',
            //'price',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, \app\models\Product $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
