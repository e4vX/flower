<?php
use app\models\Category;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="product-form">

<?php $form =ActiveForm::begin();
$li=[]; $categories=\app\models\Category::find()->all();
foreach ($categories as $category)
{
    $li[$category->id]=$category->name_category;
}

?>





    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'photo')->fileInput() ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category')->dropDownList($li) ?>

    <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'count')->textInput() ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

