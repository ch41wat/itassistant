<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\tasks\controllers\TasksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายการแจ้งงาน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('แจ้งงาน', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'task_id',
            'task_name',
            'type',
            'user',
            'priority',
            'staff',
            'status',
            'created_at:dateTime', // แสดงเฉพาวันที่ แสดงวันที่เวลา
            'updated_at:dateTime', // แสดงเฉพาวันที่
            // กำหนดเอง อ่านเพิ่มเติม link ด้านล่าง
            'complete_date',
            'solution',
            'description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
