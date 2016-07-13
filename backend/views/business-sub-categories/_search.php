<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\BusinessSubCategoriesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="business-sub-categories-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'bsc_id') ?>

    <?= $form->field($model, 'bsc_name') ?>

    <?= $form->field($model, 'bsc_image') ?>

    <?= $form->field($model, 'bsc_description') ?>

    <?= $form->field($model, 'bmc_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
