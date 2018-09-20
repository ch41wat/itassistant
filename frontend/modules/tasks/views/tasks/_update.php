<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Tasks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tasks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'task_name')->textInput(['maxlength' => true, "disabled" => "disabled"]) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true, "disabled" => "disabled"]) ?>

    <?= $form->field($model, 'user')->textInput(['maxlength' => true, "disabled" => "disabled"]) ?>

    <?= $form->field($model, 'priority')->dropDownList(['high' => 'High', 'low' => 'Low'], ['prompt' => '', "disabled" => "disabled"]) ?>

    <?= $form->field($model, 'staff')->textInput(['maxlength' => true, "disabled" => "disabled"]) ?>

    <?= $form->field($model, 'created_at')->textInput(["disabled" => "disabled"]) ?>

    <?= $form->field($model, 'updated_at')->textInput(["disabled" => "disabled"]) ?>

    <?= $form->field($model, 'status')->dropDownList(['pending' => 'Pending', 'wait for improve' => 'Wait for improve', 'progressing' => 'Progressing', 'complete' => 'Complete',], ['prompt' => '']) ?>

    <?php
    echo $form->field($model, 'status[]')->checkboxList(
            ['a' => 'Item A', 'b' => 'Item B', 'c' => 'Item C']
    );
    ?>


    <?php
    echo '<label class="control-label">วันที่แก้ปัญหาเสร็จ</label>';
    echo DatePicker::widget([
        'model' => $model,
        'name' => 'complete_date',
        'value' => date('Y-m-d'),
        'attribute' => 'complete_date',
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true,
            'autoclose' => true
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
