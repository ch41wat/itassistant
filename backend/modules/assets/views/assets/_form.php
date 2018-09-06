<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Assets */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="assets-form">

    <?php
    $form = ActiveForm::begin([
                'options' => ['enctype' => 'multipart/form-data']
    ]);
    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'serial')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mac_address')->textInput(['maxlength' => true]) ?>

    <?php
    echo '<label>วันที่ซื้อ</label>';
    echo DatePicker::widget([
        'name' => 'purchase_date',
        'value' => date('yyyy-dd-mm', strtotime('+2 days')),
        'options' => ['placeholder' => 'Select issue date ...'],
        'pluginOptions' => [
            'format' => 'yyyy-dd-mm',
            'todayHighlight' => true
        ]
    ]);
    ?>

    <?= $form->field($model, 'purchase_cost')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'image')->fileinput(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList(['พร้อมใช้' => 'พร้อมใช้', 'ส่งซ่อม' => 'ส่งซ่อม', 'มีผู้ใช้แล้ว' => 'มีผู้ใช้แล้ว',], ['prompt' => '']) ?>

    <?= $form->field($model, 'warranty_months')->textInput() ?>

    <?= $form->field($model, 'supplier_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
