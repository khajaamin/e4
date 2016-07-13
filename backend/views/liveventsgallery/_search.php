<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SearchLivevents */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="livevents-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'le_id') ?>

    <?= $form->field($model, 'le_contact_name') ?>

    <?= $form->field($model, 'le_role') ?>

    <?= $form->field($model, 'le_event_category') ?>

    <?= $form->field($model, 'le_event_name') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
