<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Tasktype;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Tasks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tasks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'task_name')->textInput(['maxlength' => true, "disabled" => "disabled"]) ?>

    <?= $form->field($model, 'type')->dropDownList(ArrayHelper::map(Tasktype::find()->all(), 'type_id', 'type_name'), (["disabled" => "disabled"])) ?>

    <?= $form->field($model, 'priority')->dropDownList(['high' => 'High', 'low' => 'Low',], ['prompt' => '', "disabled" => "disabled"]) ?>

    <?= $form->field($model, 'staff')->textInput(['maxlength' => true, "disabled" => "disabled"]) ?>

    <?= $form->field($model, 'status')->dropDownList(['pending' => 'Pending', 'wait for implove' => 'Wait for implove', 'progressing' => 'Progressing', 'complete' => 'Complete',], ['prompt' => '']) ?>

    <?=
    $form->field($model, 'complete_date')->widget(
            DatePicker::className(), [
                'inline' => false,
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yy-m-d'
                ]
            ]
    )
    ?>

    <?= $form->field($model, 'solution')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('บันทึก', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
