<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Accessories */

$this->title = 'Update Accessories: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Accessories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="accessories-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
