<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\BusinessMainCategories;
use common\models\BusinessSubCategories;

/* @var $this yii\web\View */
/* @var $model common\models\Blog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blog-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'bmc_id')->dropDownList(
     ArrayHelper::map(BusinessMainCategories::find()->where(['deleted' => 'N'])->andwhere(['<>','bmc_name',strtolower(trim('Live Event'))])->all(), 'bmc_id', 'bmc_name'),
     [
     'prompt' => 'Select Main Category',
     'onchange' => ' 
     $.post("index.php?r=business-sub-categories/lists&id=' . '"+$(this).val(),function(data){
        $("select#blog-bsc_id").html(data);
    });'
    ]); ?>

    <?= $form->field($model, 'blog_tag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'blog_heading')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'blog_content')->textArea(['rows' => '10','cols' => '5'])?>
    <?= $form->field($model, 'file')->fileInput() ?>
    <?php

    if ($model->blog_image) {
        echo '<img src="'.\Yii::$app->urlManagerCommon->baseUrl.'/'.$model->blog_image.'" width="90px">&nbsp;&nbsp;&nbsp;';
        echo Html::a('Delete Image', ['deleteimg', 'id'=>$model->blog_id, 'field'=> 'blog_image'], ['class'=>'btn btn-danger']).'<p>';
    }

    ?>

    <?= $form->field($model, 'blog_video')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'blog_audio')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
