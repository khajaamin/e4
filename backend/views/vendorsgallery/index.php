<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel common\models\VendorsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Vendors Galleries');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vendors-index">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider1,
        'filterModel' => $searchModel,
        'columns' => [
            'ven_id',
            'ven_company_name',
            'ven_contact_no',
            'ven_email_id:email',
            'ven_verified',
            'paid',
          ['class' => 'yii\grid\ActionColumn',
              'header' => 'Action',
              'template' => '{view} {update} {delete}',
              'buttons' => [
                 'view' => function ($url, $model) {
                   return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url);
                 },
                 'update' => function ($url, $model) {
                   return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url);
                 },
                 'delete' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url,[
                        'title' => Yii::t('yii', 'Delete'),
                        'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                        'data-method' => 'post',
                    ]);
                 },
              ],
              'urlCreator' => function ($action, $dataProvider, $key, $index) {

                if ($action === 'view') {
                     return Url::to(['vendorsgallery/view', 'id' =>$dataProvider['ven_id']]);
                }
                if ($action === 'update') {
                    return Url::to(['/vendorsgallery/update', 'id' =>$dataProvider['ven_id']]);
                }
                if ($action === 'delete') {
                   return Url::to(['/vendorsgallery/delete', 'id' =>$dataProvider['ven_id']]);
                }                    
                return $url;
            }
          ],
      ],
        
    ]); ?>

</div>
