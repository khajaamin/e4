<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\BusinessMainCategories */

$this->title = Yii::t('app', 'Create Business Main Categories');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Business Main Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="business-main-categories-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
