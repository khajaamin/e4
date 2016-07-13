<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LatestpostSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="latestpost-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'latest_post_id') ?>

    <?= $form->field($model, 'latest_post_heading') ?>

    <?= $form->field($model, 'latest_post_description') ?>

    <?= $form->field($model, 'latest_post_image') ?>

    <?= $form->field($model, 'latest_post_video') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
