<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\RoleTypes */

$this->title = 'Create Role Types';
$this->params['breadcrumbs'][] = ['label' => 'Role Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-types-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
