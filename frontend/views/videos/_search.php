<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\VideosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="videos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'vdo_id') ?>

    <?= $form->field($model, 'vdo_url') ?>

    <?= $form->field($model, 'vdo_user_id') ?>

    <?= $form->field($model, 'vdo_ven_id') ?>

    <?= $form->field($model, 'vdo_approved') ?>

    <?php // echo $form->field($model, 'vdo_created') ?>

    <?php // echo $form->field($model, 'vdo_updated') ?>

    <?php // echo $form->field($model, 'deleted') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
