<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CommentsAndRatings */

$this->title = Yii::t('app', 'Create Comments And Ratings');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comments And Ratings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-and-ratings-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
