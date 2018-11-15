<?php

namespace frontend\modules\tasks\controllers;

use Yii;
use common\models\Tasks;
use frontend\modules\tasks\controllers\TasksSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * TasksController implements the CRUD actions for Tasks model.
 */
class TasksController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tasks models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new TasksSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tasks model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->renderAjax('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Tasks model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Tasks();

        if ($model->load(Yii::$app->request->post())) {
            $model->user = Yii::$app->user->identity->username;
            $model->status = 'pending';
            $model->complete_date = '--';
            $current_image = $model->evidence_start_img;
            if ($model->save()) {
                $file = UploadedFile::getInstance($model, 'evidence_start_img');
                if (!empty($file)) {
                    $model->evidence_start_img = $model->task_id . '_start' . '.' . $file->extension;
                    $file->saveAs('uploads/tasks/image/start/' . $model->task_id . '_start' . '.' . $file->extension);
                } else
                    $model->evidence_start_img = $current_image;
            }
            if ($model->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->renderAjax('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tasks model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($model->status == Tasks::STATUS_reject ){
                $model->status = 5;
                if ($model->status == Tasks::STATUS_verified) {
                    $model->status = 6;
                }
            }
            return $this->redirect(['index']);
        }

        return $this->renderAjax('_update', [
                    'model' => $model,
        ]);
    }

    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id) {
        if (($model = Tasks::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
