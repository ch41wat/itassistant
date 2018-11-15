<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Tasks */

$this->title = 'รหัสการแจ้งที่ : ' . $model->task_id;
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?=
        Html::a('ยกเลิกการแจ้งงาน', ['delete', 'id' => $model->task_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'task_id',
            'task_name',
            'type',
            'user',
            'priority',
            'staff',
            'status',
            'created_at:dateTime',
            'updated_at:dateTime',
//            'complete_date:date',
            [
                'label' => 'วันที่แก้ปัญหาเสร็จ',
                'value' => $model->complete_date != '0000-00-00' ? $model->complete_date : 'ยังไม่ได้รับการแก้ไข',
            ],
            [
                'label' => 'วิธีแก้',
                'value' => $model->solution != NULL ? $model->solution : 'ยังไม่ได้รับการแก้ไข',
            ],
            [
                'label' => 'รายละเอียด',
                'value' => $model->description != NULL ? $model->description : 'ไม่ได้ระบุ',
            ],
        ],
    ])
    ?>

</div>
