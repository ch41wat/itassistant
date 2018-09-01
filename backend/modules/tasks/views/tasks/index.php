<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\tasks\controllers\TasksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายการแจ้งงาน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]);   ?>

    <p>
        <?= Html::button('แจ้งงาน', ['value' => Url::to(['customer/create']), 'title' => 'เพิ่มข้อมูลสมาชิก', 'class' => 'btn btn-success', 'id' => 'activity-create-link']); ?>
    </p>

    <?php
    Modal::begin([
        'header' => '<h4>Login</h4>',
        'id' => 'modal',
        'size' => 'modal-lg',
    ]);
    echo "<div id='modalContent'></div>";
    Modal::end();
    ?>

    <?php Pjax::begin(['id' => 'tasks_pjax_id']); ?>

    <?=
    GridView::widget([
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
    ]);
    ?>
    <?php Pjax::end() ?>
</div>
