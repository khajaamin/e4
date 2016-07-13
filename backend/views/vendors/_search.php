<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\VendorsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vendors-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ven_id') ?>

    <?= $form->field($model, 'ven_company_name') ?>

    <?= $form->field($model, 'ven_main_category_id') ?>

    <?= $form->field($model, 'ven_sub_category_id') ?>

    <?= $form->field($model, 'ven_services_offered') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
