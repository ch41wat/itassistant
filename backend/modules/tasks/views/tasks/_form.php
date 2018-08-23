<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Tasks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tasks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'task_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'priority')->dropDownList([ 'low' => 'Low', 'medium' => 'Medium', 'high' => 'High', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'staff')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'pending' => 'Pending', 'wait for implove' => 'Wait for implove', 'progressing' => 'Progressing', 'complete' => 'Complete', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'request_date')->textInput() ?>

    <?= $form->field($model, 'complete_date')->textInput() ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
