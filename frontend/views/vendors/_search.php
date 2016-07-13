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

   <!--  <?= $form->field($model, 'ven_main_category_id') ?>

    <?= $form->field($model, 'ven_sub_category_id') ?>
 -->
    <?= $form->field($model, 'ven_services_offered') ?>

    <?php // echo $form->field($model, 'ven_business_logo') ?>

    <?php // echo $form->field($model, 'ven_company_descr') ?>

    <?php // echo $form->field($model, 'ven_established_date') ?>

    <?php // echo $form->field($model, 'ven_noof_emp') ?>

    <?php // echo $form->field($model, 'ven_branches_loc') ?>

    <?php // echo $form->field($model, 'ven_market_area') ?>

    <?php // echo $form->field($model, 'ven_website') ?>

    <?php // echo $form->field($model, 'ven_specialized_in') ?>

    <?php // echo $form->field($model, 'ven_contact_no') ?>

    <?php // echo $form->field($model, 'ven_email_id') ?>

    <?php // echo $form->field($model, 'ven_address') ?>

    <?php // echo $form->field($model, 'ven_country_id') ?>

    <?php // echo $form->field($model, 'ven_state_id') ?>

    <?php // echo $form->field($model, 'ven_city_id') ?>

    <?php // echo $form->field($model, 'ven_location_id') ?>

    <?php // echo $form->field($model, 'ven_zip') ?>

    <?php // echo $form->field($model, 'ven_contact_person_id') ?>

    <?php // echo $form->field($model, 'ven_verified') ?>

    <?php // echo $form->field($model, 'created') ?>

    <?php // echo $form->field($model, 'updated') ?>

    <?php // echo $form->field($model, 'deleted') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
