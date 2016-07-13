<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\BusinessMainCategories;
use common\models\BusinessSubCategories;
use common\models\Countries;
use common\models\States;
use common\models\Locations;
use common\models\Cities;
use common\models\User;
use kartik\date\DatePicker;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model common\models\Vendors */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vendors-form">

    <?php $form = ActiveForm::begin(['id'=>'dynamic-form', 'options'=>['enctype'=>'multipart/form-data']]); ?>
    <!-- <div class="row">
    <div class="col-sm-8"> -->
        <?= $form->field($model, 'ven_company_name')->textInput(['maxlength' => true]) ?>
   <!--  </div>
    </div>
    <div class="row">
        <div class="col-sm-8"> -->
            <?= $form->field($model, 'ven_company_descr')->textArea(['rows' => '5']) ?>
     <!-- </div>
 </div> -->
 <div class="row">
    <div class="col-sm-3">
        <?= $form->field($model, 'ven_country_code')->dropDownList(
            ArrayHelper::map(Countries::find()->all(), 'country_code', 'name'),
            [
            'prompt' => 'Select Country Code'

            ]);
            ?>
        </div>
        <div class="col-sm-7">
            <?= $form->field($model, 'ven_contact_no')->textInput(array('placeholder' => 'More than one Contact No. sepreated by comma(,)')) ?>
        </div>
    </div>
    <!--<div class="row">
    <div class="col-sm-6"> -->
        <?= $form->field($model, 'ven_email_id')->textInput(['maxlength' => true]) ?>
    <!-- </div>
    </div>
    <div class="row">
        <div class="col-sm-6"> -->
            <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
            <script type="text/javascript">
                function initialize() {
                    var input = document.getElementById('vendors-ven_address');
                    var autocomplete = new google.maps.places.Autocomplete(input);
                }
                google.maps.event.addDomListener(window, 'load', initialize);
            </script>
            <?= $form->field($model, 'ven_address')->textInput(['maxlength' => true]) ?>
    <!-- </div>
    </div>
    <div class="row">
        <div class="col-sm-6"> -->
            <?= $form->field($model, 'ven_country_id')->dropDownList(
                ArrayHelper::map(Countries::find()->all(), 'id', 'name'),
                [
                'prompt' => 'Select Country',
                'onchange' => '
                $.post("index.php?r=states/lists&id=' . '"+$(this).val(),function(data){
                    $("select#vendors-ven_state_id").html(data);
                });']);
                ?>
    <!-- </div>
    </div>
    
    <div class="row">
        <div class="col-sm-6"> -->
            
    <!-- </div>
    </div>
    <div class="row">
        <div class="col-sm-6"> -->
            <?= $form->field($model, 'ven_zip')->textInput(['maxlength' => true]) ?>
    <!-- </div>
    </div>
    <div class="row">
        <div class="col-sm-6"> -->
            <?= $form->field($model, 'file')->fileInput() ?>
            <?php
            if ($model->ven_business_logo) {
                echo '<img src="'.\Yii::$app->urlManagerCommon->baseUrl.'/'.$model->ven_business_logo.'" width="90px">&nbsp;&nbsp;&nbsp;';
                echo Html::a('Delete Image', ['deleteimg', 'id'=>$model->ven_id, 'field'=> 'ven_business_logo'], ['class'=>'btn btn-danger']).'<p>';
            }
            ?>
   <!--  </div>
    </div>
    <div class="row">
        <div class="col-sm-6"> -->
            <?= $form->field($model, 'ven_services_offered')->textInput(['maxlength' => true]) ?>
    <!-- </div>
    </div>
    <div class="row"> 
       <div class="col-sm-6">-->
       <?php
        $dr = [];
        for($i = date("Y"); $i > date("Y") - 100; $i--) {
            $dr[] = $i;
        }
        echo $form->field($model, 'ven_established_date')->dropDownList($dr);
       ?>
       
  <!--  </div>
  <div class="col-sm-6"> -->

   <!--  </div>
   </div>
    <div class="row">
        <div class="col-sm-6"> -->
            <?= $form->field($model, 'ven_noof_emp')->textInput() ?>
   <!--  </div>
    </div>
    <div class="row">
        <div class="col-sm-6"> -->
            <?= $form->field($model, 'ven_branches_loc')->textInput(['maxlength' => true]) ?>
    <!-- </div>
    </div>
    <div class="row">
        <div class="col-sm-6"> -->
            <?= $form->field($model, 'ven_market_area')->textInput(['maxlength' => true]) ?>
   <!--  </div>
    </div>
    <div class="row">
        <div class="col-sm-6"> -->
            <?= $form->field($model, 'ven_website')->textInput(['maxlength' => true]) ?>
   <!--  </div>
    </div>
    <div class="row">
        <div class="col-sm-6"> -->
            <?= $form->field($model, 'ven_specialized_in')->textInput(['maxlength' => true]) ?>
   <!--  </div>
</div> -->
<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> Select Your Business Categories</h4></div>
        <div class="panel-body">
           <?php DynamicFormWidget::begin([
                        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                        'widgetBody' => '.container-items', // required: css class selector
                        'widgetItem' => '.item', // required: css class
                        // 'limit' => 4, // the maximum times, an element can be cloned (default 999)
                        'min' => 1, // 0 or 1 (default 1)
                        'insertButton' => '.add-item', // css class
                        'deleteButton' => '.remove-item', // css class
                        'model' => $modelsVendorsMoreCategories[0],
                        'formId' => 'dynamic-form',
                        'formFields' => [
                        'bmc_id',
                        'bsc_id',
                        ],
                        ]); ?>

                        <div class="container-items"><!-- widgetContainer -->

                            <?php foreach ($modelsVendorsMoreCategories as $i => $modelVendorsMoreCategories): ?>

                                <div class="item panel panel-default"><!-- widgetBody -->
                                    <div class="panel-heading">
                                        <h3 class="panel-title pull-left">Categories</h3>
                                        <div class="pull-right">
                                            <button type="button" class="add-item btn btn-success btn-xs" onclick="hideButton(this)" ><i class="glyphicon glyphicon-plus"></i></button>
                                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="panel-body">
                                        <?php
                                        // necessary for update action.
                                        $this->registerJs('
                                            $(document).ready(function(){ 
                                             $("#addbtn").remove();
                                         });', \yii\web\View::POS_READY);
                                        if (!$modelVendorsMoreCategories->isNewRecord) {
                                            echo Html::activeHiddenInput($modelVendorsMoreCategories, "[{$i}]ven_id");
                                        }
                                        ?>

                                        <div class="row">
                                            <div class="col-sm-6">
                                               <?=
                                               $this->registerJs('
                                                window.hideButton=(function(e){
                                                    $(e).hide();
                                                })
                                               $(document).ready(function(){ 

                                                $(".add-item").click(function(){

                                                 $(this).hide();

                                             });                                        
                                           });', \yii\web\View::POS_READY);


                                               echo $form->field($modelVendorsMoreCategories, "[{$i}]bmc_id")->dropDownList(
                                                ArrayHelper::map(BusinessMainCategories::find()->where(['deleted' => 'N'])->andwhere(['<>','bmc_name',strtolower(trim('Live Event'))])->all(), 'bmc_id', 'bmc_name'),
                                                [

                                                'prompt' => 'Select Main Category',
                                                'onchange' => ' 
                                                var valint=this.id;
                                                var finVal=valint.replace("bmc_id", "bsc_id");
                                                $.post("index.php?r=business-sub-categories/lists&id=' . '"+$(this).val(),function(data){
                                                    $("select#"+finVal).html(data);
                                                });']);

                                                ?>
                                            </div>
                                            <div class="col-sm-6" id="c">
                                                <?= $form->field($modelVendorsMoreCategories, "[{$i}]bsc_id")->dropDownList(
                                                    ArrayHelper::map(BusinessSubCategories::find()->all(), 'bsc_id', 'bsc_name'),
                                                    [
                                                    'prompt' => 'Select Sub Category'
                                                    ]);
                                                    ?>
                                                </div>
                                            </div><!-- .row -->                                  
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <?php DynamicFormWidget::end();?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>