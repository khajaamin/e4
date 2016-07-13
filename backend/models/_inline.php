<?php

use synatree\dynamicrelations\DynamicRelations;
use kartik\widgets\ActiveForm;
use kartik\datecontrol\DateControl;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\BusinessHours */
/* @var $form kartik\widgets\ActiveForm */

// generate something globally unique.
$uniq = uniqid();

if( $model->primaryKey )
{
    // you must define an attribute called "data-dynamic-relation-remove-route" if you plan to allow inline deletion of models from the form.

    $removeAttr = 'data-dynamic-relation-remove-route="' . 
        Url::toRoute(['business-hours/delete', 'id'=>$model->primaryKey]) . '"';
   // $frag = "BusinessHours[{$model->primaryKey}]";
     $frag = "Po[{$model->primaryKey}]";
}
else
{
    $removeAttr = "";
    // new models must go under a key called "[new]"
    $frag = "Po[new][$uniq]";
}

?>
<div class="BusinessHours-form form-inline" <?= $removeAttr; ?>>

    <?= DateControl::widget([
            'type' => DateControl::FORMAT_DATE,
            'name' => $frag.'[day]', // expanded, this ends up being something like BusinessHours[1][day] or BusinessHours[new][random][day]
            'value' => $model->day,
            // for Kartik widgets, include the following line.  This basically generates a globally unique set of pluginOptions, which is important to prevent
            // javascript errors and make sure everything works as expected.
            'options' => DynamicRelations::uniqueOptions('day',$uniq)
    ]);?>
    .... More widgets use the same structure as above .... 
</div>