<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CommentsAndRatingsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comments-and-ratings-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cr_id') ?>

    <?= $form->field($model, 'cr_comment') ?>

    <?= $form->field($model, 'cr_ratings') ?>

    <?= $form->field($model, 'cr_type') ?>

    <?= $form->field($model, 'cr_type_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
