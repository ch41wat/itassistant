<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Tasks */
/* @var $form ActiveForm */
?>
<div class="frontend-modules-tasks-views-tasks-check">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'task_name') ?>
        <?= $form->field($model, 'type') ?>
        <?= $form->field($model, 'user') ?>
        <?= $form->field($model, 'priority') ?>
        <?= $form->field($model, 'staff') ?>
        <?= $form->field($model, 'status') ?>
        <?= $form->field($model, 'created_at') ?>
        <?= $form->field($model, 'updated_at') ?>
        <?= $form->field($model, 'complete_date') ?>
        <?= $form->field($model, 'solution') ?>
        <?= $form->field($model, 'description') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- frontend-modules-tasks-views-tasks-check -->
