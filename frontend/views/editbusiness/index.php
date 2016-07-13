<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\EditbusinessSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Editbusinesses');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="editbusiness-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Editbusiness'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'edit_bui_id',
            'edit_ven_id',
            'edit_bui_email:email',
            'edit_bui_contact',
            'edit_type',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
