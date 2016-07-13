
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
<!--Simple User form Start Here-->
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-bottom:10px;">
  <div class="panel panel-primary" style="margin-bottom:0px; ">
    <div class="panel-heading">
      <strong style="font-size:18px;">Signup For New Users</strong>
    </div>
    <div class="well" style="margin-bottom:0px;">
     
      <?php $form = ActiveForm::begin(['id' => 'form-signup-one']); ?>

      <?= $form->field($model, 'username') ?>

      <?= $form->field($model, 'email') ?>

      <?= $form->field($model, 'password')->passwordInput() ?>

      <div class="form-group">
        <button type = "submit" class = "btn btn-primary pull-right">
          <strong>Signup</strong>
        </button>

      </div>

      <?php ActiveForm::end(); ?>
      <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>

  </div>
  <!-- OR Start Here -->
  <!--<div class="" style="text-align: center;">
    <br>
    <span class="orgroup" id="vendorform">
      OR
    </span>

    <div class="clearfix"></div>

  </div>-->
  <!-- OR End Here -->

</div>
<!--Simple User form End Here-->
