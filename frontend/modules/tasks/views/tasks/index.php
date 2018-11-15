<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\tasks\controllers\TasksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'ข้อมูลการแจ้งงาน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-index">

    <p>
        <?= Html::button('แจ้งงาน', ['value' => Url::to('index.php?r=tasks/tasks/create'), 'class' => 'btn btn-success', 'id' => 'activity-create-link']) ?>
    </p>

    <?php
    Modal::begin([
        'header' => '<h4>แจ้งงาน</h4>',
        'id' => 'activity-modal',
        'size' => 'modal-small',
    ]);
    echo "<div id='modalContent'></div>";
    Modal::end();
    ?>
    <?php $this->registerJs('
        function init_click_handlers(){
            $("#activity-create-link").click(function(e) {
                    $.get(
                        "?r=tasks/tasks/create",
                        function (data)
                        {
                            $("#activity-modal").find(".modal-body").html(data);
                            $(".modal-body").html(data);
                            $(".modal-title").html("แจ้งงาน");
                            $("#activity-modal").modal("show");
                        }
                    );
                });
                $(".activity-view-link").click(function(e) {
                    var fID = $(this).closest("tr").data("key");
                    $.get(
                        "?r=tasks/tasks/view",
                        {
                            id: fID
                        },
                        function (data)
                        {
                            $("#activity-modal").find(".modal-body").html(data);
                            $(".modal-body").html(data);
                            $(".modal-title").html("เปิดดูข้อมูลการแจ้งงาน");
                            $("#activity-modal").modal("show");
                        }
                    );
                });
            $(".activity-update-link").click(function(e) {
                    var fID = $(this).closest("tr").data("key");
                    $.get(
                        "?r=tasks/tasks/update",
                        {
                            id: fID
                        },
                        function (data)
                        {
                            $("#activity-modal").find(".modal-body").html(data);
                            $(".modal-body").html(data);
                            $(".modal-title").html("แก้ไขข้อมูลการแจ้งงาน");
                            $("#activity-modal").modal("show");
                        }
                    );
                });
            }
        init_click_handlers(); //first run
        $("#customer_pjax_id").on("pjax:success", function() {
          init_click_handlers(); //reactivate links in grid after pjax update
        });'); ?>
    <?php Pjax::begin(); ?>

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
            'created_at:dateTime',
            //'updated_at',
            [
                'attribute' => 'complete_date',
//                'header' => 'วันที่แก้เสร็จ',
//                'format' => 'date',
                'value' => function($model, $key, $index) {
                    if ($model->complete_date == '0000-00-00') {
                        return 'ยังไม่ได้รับการแก้ไข';
                    } else {
                        return $model->complete_date;
                    }
                },
            ],
            //'solution',
            //'description',
            [
                'attribute' => 'status',
                'value' => function($model, $key, $index){
                    if($model->status == 'verified'){
                        return 'ผ่านการตรวจสอบ';
                    } else if($model->status == 'reject'){
                        return 'ไม่ผ่านการตรวจสอบ';
                    } else if($model->status == 'complete'){
                        return 'แก้ไขแล้ว';
                    } else {
                        return $model->status;
                    }
                },
            ],
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update} {view}',
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                        return $model->status === 'complete' ?
                                Html::a('<span class="glyphicon glyphicon-pencil"></span>', '#', [
                                    'class' => 'activity-update-link',
                                    'title' => 'เปิดดูข้อมูล',
                                    'data-toggle' => 'modal',
                                    'data-target' => '#activity-modal',
                                    'data-id' => $key,
                                    'data-pjax' => '0',
                                ]) : Html::a('', 'javascript:void(0);');
                    },
                    'view' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', '#', [
                                    'class' => 'activity-view-link',
                                    'title' => 'เปิดดูข้อมูล',
                                    'data-toggle' => 'modal',
                                    'data-target' => '#activity-modal',
                                    'data-id' => $key,
                                    'data-pjax' => '0',
                        ]);
                    },
                ]
            ],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?>
</div>