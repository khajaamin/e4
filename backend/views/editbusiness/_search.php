<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SearchEditbusiness */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="editbusiness-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'edit_bui_id') ?>

    <?= $form->field($model, 'edit_ven_id') ?>

    <?= $form->field($model, 'edit_bui_email') ?>

    <?= $form->field($model, 'edit_bui_contact') ?>

    <?= $form->field($model, 'edit_type') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
