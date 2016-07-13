<style>
  .orgroup{
    /*border: 1px solid white;*/
    padding: 5px 10px;
    border-radius: 50%;
    background: rgb(51, 122, 183) none repeat scroll 0% 0%;
    text-align: center;
    margin-bottom: 5px;
    font-weight: bold;
    color: white;
  }
</style>


<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Countries;




$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>

<h2><?= Html::encode($this->title) ?></h2>

<br>
<!--Vendor User Form Start-->
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" >
  <div class="panel panel-primary" style="margin-bottom:0px; ">
    <div class="panel-heading">
      <strong style="font-size:18px;">Signup For New Vendors</strong>
    </div>

    <div class="well" style="margin-bottom:0px;">
     <!--  <form role="form"> -->
     <?php $form = ActiveForm::begin(['id' => 'form-signup-two']) ?>

     <?= $form->field($model2, 'fname') ?>
     <?= $form->field($model2, 'mname') ?>
     <?= $form->field($model2, 'lname') ?>
     <?= $form->field($model2, 'username') ?>
     <?= $form->field($model2, 'email') ?>
     <?= $form->field($model2, 'password')->passwordInput() ?>
     <?= $form->field($model2, 'designation') ?>
     <div class="row">
      <div class="col-sm-3">
        <?= $form->field($model2, 'country_code')->dropDownList(
          ArrayHelper::map(Countries::find()->all(), 'country_code', 'name'),
          [
          'prompt' => 'Select Country Code'

          ]);
          ?>
        </div>
        <div class="col-sm-8">
          <?= $form->field($model2, 'contact_no') ?>
        </div>
      </div>

      <button type = "submit" class = "btn btn-success pull-right">
       <strong>Signup</strong>
     </button>
     <?php ActiveForm::end(); ?>
     <!--   </form> -->
     <div class="clearfix"></div>
   </div>
 </div>
 <div class="clearfix"></div>
</div>
<!--Vendor User Form End-->
