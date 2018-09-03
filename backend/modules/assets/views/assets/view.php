<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Assets */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Assets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assets-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= Html::img('uploads/asset/' . $model->image, ['class' => 'thumbnail', 'width' => 200]) ?>
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
    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'model',
            'serial',
            'mac_address',
            'purchase_date',
            'purchase_cost',
            'order_number',
            'description:ntext',
            'user_id',
            'status',
            'warranty_months',
            'supplier_id',
        ],
    ])
    ?>

</div>
