<?php

namespace backend\modules\mainjob\controllers;

use Yii;
use backend\modules\mainjob\models\MainJob;
use backend\modules\mainjob\models\MainJobSearch;

use backend\components\AdzpireComponent;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;

use yii\helpers\ArrayHelper;

/**
 * JobController implements the CRUD actions for MainJob model.
 */
class JobController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                //'only' => ['create', 'update', 'delete'],
                'rules' => [
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['root'],
                    ],
                    // everything else is denied by default
                ],
            ],
        ];
    }

    public $moduletitle;
    public function beforeAction($action){
       //$this->checkperson = Person::findOne([Yii::$app->user->id]);
       $this->moduletitle = Yii::t('app', Yii::$app->controller->module->params['title']);
        return parent::beforeAction($action);
    }
	 
    /**
     * Lists all MainJob models.
     * @return mixed
     */
    public function actionIndex()
    {
		 
		 Yii::$app->view->title = Yii::t('app', 'รายการ ').' - '.$this->moduletitle;
		 
        $searchModel = new MainJobSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MainJob model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		 $model = $this->findModel($id);
		 
		 Yii::$app->view->title = Yii::t('app', 'ดูรายละเอียด').' : '.$model->stc_id.' - '.$this->moduletitle;
		 
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new MainJob model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		 Yii::$app->view->title = Yii::t('app', 'สร้างใหม่').' - '.Yii::t('app', $this->moduletitle);
		 
        $model = new MainJob();

		/* if enable ajax validate
		if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
			Yii::$app->response->format = Response::FORMAT_JSON;
			return ActiveForm::validate($model);
		}*/
		
        if ($model->load(Yii::$app->request->post())) {
			if($model->save()){
                AdzpireComponent::succalert('addflsh', 'เพิ่มรายการใหม่เรียบร้อย');
			    return $this->redirect(['view', 'id' => $model->stc_id]);
			}else{
                AdzpireComponent::dangalert('addflsh', 'เพิ่มรายการไม่ได้');
			}
            print_r($model->getErrors());exit;
        }

            return $this->render('create', [
                'model' => $model,
            ]);
        

    }

    /**
     * Updates an existing MainJob model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		 $model = $this->findModel($id);
		 
		 Yii::$app->view->title = Yii::t('app', 'ปรับปรุงรายการ {modelClass}: ', [
    'modelClass' => 'Main Job',
]) . $model->stc_id.' - '.$this->moduletitle;
		 
        if ($model->load(Yii::$app->request->post())) {
			if($model->save()){
                AdzpireComponent::succalert('edtflsh', 'ปรับปรุงรายการเรียบร้อย');
			    return $this->redirect(['view', 'id' => $model->stc_id]);
			}else{
                AdzpireComponent::dangalert('edtflsh', 'ปรับปรุงรายการไม่ได้');
			}
            print_r($model->getErrors());exit;
        } 

            return $this->render('update', [
                'model' => $model,
            ]);
        

    }

    /**
     * Deletes an existing MainJob model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        AdzpireComponent::succalert('edtflsh', 'ลบรายการเรียบร้อย');

        return $this->redirect(['index']);
    }

    /**
     * Finds the MainJob model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MainJob the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MainJob::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('ไม่พบหน้าที่ต้องการ.');
        }
    }
}
