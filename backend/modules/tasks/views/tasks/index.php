<<<<<<< HEAD
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

    <?php
    Modal::begin([
        'header' => '<h4>แจ้งงาน</h4>',
        'id' => 'activity-modal',
        'size' => 'modal-lg',
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
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', '#', [
                                    'class' => 'activity-update-link',
                                    'title' => 'เปิดดูข้อมูล',
                                    'data-toggle' => 'modal',
                                    'data-target' => '#activity-modal',
                                    'data-id' => $key,
                                    'data-pjax' => '0',
                        ]);
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
=======
<?php

//use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\helpers\Html;
use kartik\grid\GridView;
use kartik\export\ExportMenu;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
//use yii\helpers\Url;
use dosamigos\datepicker;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\tasks\controllers\TasksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'ข้อมูลการแจ้งงาน';
$this->params['breadcrumbs'][] = $this->title;
?>

                    <?php
                    Modal::begin([
                        'header' => '<h4>แจ้งงาน</h4>',
                        'id' => 'activity-modal',
                        'size' => 'modal-lg',
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

                    <?php
                    $customDropdown = [
                        'options' => ['tag' => false],
                        'linkOptions' => ['class' => 'dropdown-item']
                    ];
                    $gridColumns = [
                        ['class' => 'kartik\grid\SerialColumn'],
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
                            'value' => function($model, $key, $index) {
                                if ($model->status == 'verified') {
                                    return 'ผ่านการตรวจสอบ';
                                } else if ($model->status == 'reject') {
                                    return 'ไม่ผ่านการตรวจสอบ';
                                } else if ($model->status == 'complete') {
                                    return 'แก้ไขแล้ว';
                                } else {
                                    return $model->status;
                                }
                            },
                        ],
                        [
                            'attribute' => 'created_at',
                            'value' => 'created_at',
                            'format' => 'raw',
                            'filter' => DatePicker::widget([
                                'model' => $searchModel,
                                'attribute' => 'created_at',
                                    'clientOption' => [
                                      'autoclose' => true,
                                      'format' => 'dd-mm-yyyy',
                                    ],
                            ]),
                        ],
                        ['class' => 'yii\grid\ActionColumn',
                            'template' => '{update} {view}',
                            'buttons' => [
                                'update' => function ($url, $model, $key) {
                                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', '#', [
                                                'class' => 'activity-update-link',
                                                'title' => 'เปิดดูข้อมูล',
                                                'data-toggle' => 'modal',
                                                'data-target' => '#activity-modal',
                                                'data-id' => $key,
                                                'data-pjax' => '0',
                                    ]);
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
                    ];
                    $fullExportMenu = ExportMenu::widget([
                                'dataProvider' => $dataProvider,
                                'columns' => $gridColumns,
                                'target' => ExportMenu::TARGET_BLANK,
                                'asDropdown' => false, // this is important for this case so we just need to get a HTML list    
                                'dropdownOptions' => [
                                    'label' => '<i class="fas fa-external-link-alt"></i> Full'
                                ],
                                'exportConfig' => [// set styling for your custom dropdown list items
                                    ExportMenu::FORMAT_CSV => $customDropdown,
                                    ExportMenu::FORMAT_TEXT => $customDropdown,
                                    ExportMenu::FORMAT_HTML => $customDropdown,
                                    ExportMenu::FORMAT_PDF => $customDropdown,
                                    ExportMenu::FORMAT_EXCEL => $customDropdown,
                                    ExportMenu::FORMAT_EXCEL_X => $customDropdown,
                                ],
                    ]);
                    echo GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => $gridColumns,
                        'panel' => [
                            'type' => GridView::TYPE_PRIMARY,
                            'heading' => '<h3 class="panel-title"><i class="fa fa-sticky-note"></i> ข้อมูลการแจ้งงาน</h3>',
                        ],
                        'exportContainer' => [
                            'class' => 'btn-group mr-2'
                        ],
                        // the toolbar setting is default
                        'toolbar' => [
                            '{export}',
                            ['content' =>
                                Html::a('<i class="fas fa-redo"></i>', ['grid-demo'], ['data-pjax' => 0, 'class' => 'btn btn-secondary', 'title' => Yii::t('kvgrid', 'Reset Grid')])
                            ],
                        ],
                    ]);
                    ?>
                    <?php Pjax::end(); ?>
                
>>>>>>> d40e6628415585499207be2addbc623ddf8aebd7
