<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use common\models\Department;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\employee\controllers\EmployeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employees';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Employee', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'user.username',
            'user.email',
            'firstname',
            'lastname',
            'tel',
//            'picture',
            [
                'attribute' => 'picture',
                'format' => 'html',
                'value' => function($model){
                    return Html::img('uploads/employee/'.$model->picture, ['class' => 'thumnail', 'width' => 40]);
                }
            ],
//            'department.name',
            [
              'attribute' => 'department_id',
              'value' => function($model){
                return $model->department->name;
              },
              'filter' => Html::activeDropDownList($searchModel, 'department_id', ArrayHelper::map(Department::find()->all(),'id', 'name'),['class' => 'form-control']),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
