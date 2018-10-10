<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RoleTypes */

$this->title = 'Update Role Types: ' . $model->role_id;
$this->params['breadcrumbs'][] = ['label' => 'Role Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->role_id, 'url' => ['view', 'id' => $model->role_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="role-types-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
