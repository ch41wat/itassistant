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

    <?= $form->field($model, 'priority')->dropDownList([ 'ไม่เร่งด่วน' => '���ม่เร่งด่วน', 'เร่งด่วน' => '���ร่งด่วน', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'staff')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'รอการตรวจสอบ' => '���อการตรวจสอบ', 'รออนุมัติ' => '���ออนุมัติ', 'กำลังดำเนินการ' => '���ำลังดำเนินการ', 'เสร็จสิ้น' => '���สร็จสิ้น', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'request_date')->textInput() ?>

    <?= $form->field($model, 'complete_date')->textInput() ?>

    <?= $form->field($model, 'solution')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
