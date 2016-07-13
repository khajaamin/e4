<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\VendorsMoreCategoriesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vendors-more-categories-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'vmc_id') ?>

    <?= $form->field($model, 'ven_id') ?>

    <?= $form->field($model, 'bmc_id') ?>

    <?= $form->field($model, 'bsc_id') ?>
<!-- 
    <?= $form->field($model, 'created') ?>
 -->
    <?php // echo $form->field($model, 'deleted') ?>

    <?php // echo $form->field($model, 'vmc_approved') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
