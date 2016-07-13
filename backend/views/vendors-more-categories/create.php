<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\VendorsMoreCategories */

$this->title = Yii::t('app', 'Create Vendors More Categories');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vendors More Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vendors-more-categories-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
