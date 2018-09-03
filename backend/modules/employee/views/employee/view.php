<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Employee */

$this->title = $model->firstname . ' ' . $model->lastname;
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-view">

    <div class="text-center">
        <?= Html::img('uploads/employee/' . $model->picture, ['class' => 'thumbnail', 'width' => 80]) ?>
    </div>
    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'user.username',
            'user.email',
            'firstname',
            'lastname',
            'tel',
//            'picture',
            'department.name',
        ],
    ])
    ?>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>
</div>
