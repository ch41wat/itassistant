<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Tasks */

$this->title = 'อัพเดทการแจ้งงาน รหัสการแจ้งที่: ' . $model->task_id;
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->task_id, 'url' => ['view', 'id' => $model->task_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tasks-update">

    <?= $this->render('_update', [
        'model' => $model,
    ]) ?>

</div>
