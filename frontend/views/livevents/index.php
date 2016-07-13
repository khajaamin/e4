<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\LiveventsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Livevents');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="livevents-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Livevents'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'le_id',
            'le_contact_name',
            'le_image',
            'le_role',
            'le_event_category',
            // 'le_event_name',
            // 'le_description',
            // 'le_venue',
            // 'le_city_id',
            // 'le_contacts',
            // 'le_emailid:email',
            // 'created',
            // 'updated',
            // 'deleted',
            // 'verified',
            // 'paid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
