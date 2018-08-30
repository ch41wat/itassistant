<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Tasks */

$this->title = 'แจ้งงาน';
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
