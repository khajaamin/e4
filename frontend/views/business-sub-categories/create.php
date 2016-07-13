<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\BusinessSubCategories */

$this->title = Yii::t('app', 'Create Business Sub Categories');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Business Sub Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="business-sub-categories-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
