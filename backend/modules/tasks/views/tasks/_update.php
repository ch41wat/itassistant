<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Tasks;
use common\models\Tasktype;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Tasks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tasks-form">

    <?php
    $form = ActiveForm::begin([
                'options' => ['enctype' => 'multipart/form-data']
    ]);
    ?>

    <?= $form->field($model, 'task_name')->textInput(['maxlength' => true, "disabled" => "disabled"]) ?>

    <?= $form->field($model, 'type')->dropDownList(ArrayHelper::map(Tasktype::find()->all(), 'type_id', 'type_name'), (["disabled" => "disabled"])) ?>

    <?= $form->field($model, 'priority')->dropDownList(['high' => 'High', 'low' => 'Low',], ['prompt' => '', "disabled" => "disabled"]) ?>

    <?= $form->field($model, 'staff')->textInput(['maxlength' => true, "disabled" => "disabled"]) ?>

    <?= $form->field($model, 'status')->dropDownList(['pending' => 'Pending', 'wait for implove' => 'Wait for implove', 'progressing' => 'Progressing', 'complete' => 'Complete',], ['prompt' => '']) ?>

    <?= $form->field($model, 'evidence_end_img')->fileinput(); ?>

    <?=
    DatePicker::widget([
        'model' => $model,
        'attribute' => 'complete_date',
        'value' => date('yy-dd-mm', strtotime('+2 days')),
        'template' => '{addon}{input}',
        'clientOptions' => [
            'autoclose' => false,
            'format' => 'yyyy-mm-dd'
        ]
    ]);
    ?>

    <?= $form->field($model, 'solution')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
