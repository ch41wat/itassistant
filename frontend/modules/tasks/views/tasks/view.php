<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Tasks */

$this->title = 'รหัสการแจ้งที่ : '.$model->task_id;
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-view">

    <h1><?= Html::encode($this->title) ?></h1>

    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'task_id',
            'task_name',
            'type',
            'user',
            'priority',
            'staff',
            'status',
            'created_at',
            'updated_at',
            'complete_date',
            'solution',
            'description',
        ],
    ]) ?>

</div>
