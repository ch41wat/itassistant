<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Accessories */

$this->title = 'Create Accessories';
$this->params['breadcrumbs'][] = ['label' => 'Accessories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accessories-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
