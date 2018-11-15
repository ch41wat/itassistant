<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\tasktype\controllers\TasktypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasktypes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasktype-index">

    <p>
        <?= Html::button('เพิ่มประเภทการแจ้งงาน', ['value' => Url::to('index.php?r=tasktype/tasktype/create'), 'class' => 'btn btn-success', 'id' => 'activity-create-link']) ?>
    </p>

    <?php
    Modal::begin([
        'header' => '<h4>ประเภทการแจ้งงาน</h4>',
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
                        "?r=tasktype/tasktype/create",
                        function (data)
                        {
                            $("#activity-modal").find(".modal-body").html(data);
                            $(".modal-body").html(data);
                            $(".modal-title").html("ประเภทการแจ้งงาน");
                            $("#activity-modal").modal("show");
                        }
                    );
                });
                $(".activity-view-link").click(function(e) {
                    var fID = $(this).closest("tr").data("key");
                    $.get(
                        "?r=tasktype/tasktype/view",
                        {
                            id: fID
                        },
                        function (data)
                        {
                            $("#activity-modal").find(".modal-body").html(data);
                            $(".modal-body").html(data);
                            $(".modal-title").html("เปิดดูข้อมูลประเภทการแจ้งงาน");
                            $("#activity-modal").modal("show");
                        }
                    );
                });
            $(".activity-update-link").click(function(e) {
                    var fID = $(this).closest("tr").data("key");
                    $.get(
                        "?r=tasktype/tasktype/update",
                        {
                            id: fID
                        },
                        function (data)
                        {
                            $("#activity-modal").find(".modal-body").html(data);
                            $(".modal-body").html(data);
                            $(".modal-title").html("แก้ไขข้อมูลประเภทการแจ้งงาน");
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

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'type_id',
            'type_name',
            'description',

            ['class' => 'yii\grid\ActionColumn',
                'buttons' => [
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
                    'update' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', '#', [
                                    'class' => 'activity-update-link',
                                    'title' => 'แก้ไขข้อมูล',
                                    'data-toggle' => 'modal',
                                    'data-target' => '#activity-modal',
                                    'data-id' => $key,
                                    'data-pjax' => '0',
                        ]);
                    },
                ]
            ],
        ],
    ]); ?>
</div>
