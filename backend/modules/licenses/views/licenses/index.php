<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\licenses\controllers\LicensesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Licenses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="licenses-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Licenses', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'version',
            'categories',
            'serial',
            //'purchase_date',
            //'purchase_cost',
            //'order_number',
            //'seats',
            //'description:ntext',
            //'image:ntext',
            //'user_id',
            //'supplier_id',
            //'expiration_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
