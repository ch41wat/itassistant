<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\RoleModulePermission */

$this->title = 'Create Role Module Permission';
$this->params['breadcrumbs'][] = ['label' => 'Role Module Permissions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-module-permission-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
