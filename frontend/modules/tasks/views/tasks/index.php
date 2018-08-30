<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\tasks\controllers\TasksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายการแจ้งงาน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?= Html::button('แจ้งงาน', ['value' => Url::to(['tasks/create']), 'title' => 'สร้างการแจ้งงาน', 'class' => 'btn btn-success', 'id' => 'activity-create-link']); ?>
    </p>

    <?php Pjax::begin(['id' => 'customer_pjax_id']); ?>
    <?php
    Modal::begin([
        'id' => 'activity-modal',
        'header' => '<h4 class="modal-title">การแจ้งงาน</h4>',
        'size' => 'modal-lg',
        'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">ปิด</a>',
    ]);
    Modal::end();
    ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'responsive' => true,
        'hover' => true,
        'floatHeader' => true,
        'pjax' => true,
        'pjaxSettings' => [
            'neverTimeout' => true,
            'enablePushState' => false,
            'options' => ['id' => 'CustomerGrid'],
        ],
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
