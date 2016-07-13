<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\BusinessMainCategories;
use common\models\BusinessSubCategories;
use common\models\User;
use common\models\Countries;
use common\models\States;
use common\models\Locations;
use common\models\Cities;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="user-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'password')->passwordInput() ?>
    
    <?= $form->field($model, 'type')->dropDownList([ 'Admin' => 'Admin',
    'Vendor' => 'Vendor'], ['prompt' => 'Select user type']) ?>

    <?= $form->field($model, 'fname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'designation')->textInput(['maxlength' => true]) ?>

    <div class="row">
      <div class="col-sm-3">
    <?= $form->field($model, 'country_code')->dropDownList(
      ArrayHelper::map(Countries::find()->all(), 'country_code', 'name'),
      [
      'prompt' => 'Select Country Code'

      ]);
      ?>
      
      </div>
      <div class="col-sm-8">
        <?= $form->field($model, 'contact_no') ?>
      </div>
    </div>

      <!--DropdownList created here-->
      <?= $form->field($model, 'country_id')->dropDownList(
        ArrayHelper::map(Countries::find()->all(), 'id', 'name'),
        [
        'prompt' => 'Select Country',
        'onchange' => '
        $.post("index.php?r=states/lists&id=' . '"+$(this).val(),function(data){
            $("select#user-state_id").html(data);
        });'
      ]);
      ?>

      <?= $form->field($model, 'state_id')->dropDownList(
        ArrayHelper::map(States::find()->all(), 'id', 'name'),
        [
        'prompt' => 'Select State',
        'onchange' => '
        $.post("index.php?r=cities/lists&id=' . '"+$(this).val(),function(data){
            $("select#user-city_id").html(data);
        });'
      ]);

      ?>
      <?= $form->field($model, 'city_id')->dropDownList(
        ArrayHelper::map(Cities::find()->all(), 'id', 'name'),
        [
        'prompt' => 'Select City',
        'onchange' => '
        $.post("index.php?r=locations/lists&id=' . '"+$(this).val(),function(data){
            $("select#user-location_id").html(data);
        });'
      ]);

      ?>
      <?= $form->field($model, 'location_id')->dropDownList(
        ArrayHelper::map(Locations::find()->all(), 'id', 'name'),
        [
        'prompt' => 'Select Area'

        ]);
        ?>

        <?= $form->field($model, 'zip')->textInput() ?>
  
    <?= $form->field($model, 'verified')->dropDownList([ 'Yes' => 'Yes', 'No' => 'No', ], ['prompt' => '']) ?>

<div class="form-group">
   <button type = "submit" class = "btn btn-success pull-right">
       <strong>Create</strong>
   </button>
   
   <!--   </form> -->
   <div class="clearfix"></div>
   
    <!--  = Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) 
-->
</div>

<?php ActiveForm::end(); ?>

</div>