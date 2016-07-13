<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SpotlightSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="spotlight-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'spotlt_id') ?>

    <?= $form->field($model, 'spotlt_heading') ?>

    <?= $form->field($model, 'spotlt_description') ?>

    <?= $form->field($model, 'spotlt_image') ?>

    <?= $form->field($model, 'spotlt_video') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
