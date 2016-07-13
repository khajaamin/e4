<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Vendors */
ini_set('memory_limit', '-1');
$this->title = Yii::t('app', 'Add your Company');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vendors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
ini_set('memory_limit', '-1');
?>
<div class="vendors-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsVendorsMoreCategories' => $modelsVendorsMoreCategories
    ]) ?>

</div>
