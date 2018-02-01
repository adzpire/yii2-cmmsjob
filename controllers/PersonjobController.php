<?php

namespace backend\modules\mainjob\controllers;

use backend\modules\mainjob\models\MainJob;
use Yii;
use backend\modules\mainjob\models\PersonJob;
use backend\modules\mainjob\models\PersonJobSearch;
use backend\modules\person\models\Person;

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
 * PersonjobController implements the CRUD actions for PersonJob model.
 */
class PersonjobController extends Controller
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
     * Lists all PersonJob models.
     * @return mixed
     */
    public function actionIndex()
    {
		 
		 Yii::$app->view->title = Yii::t('app', 'รายการ').' - '.$this->moduletitle;
		 
        $searchModel = new PersonJobSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PersonJob model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		 $model = $this->findModel($id);
		 
		 Yii::$app->view->title = Yii::t('app', 'ดูรายละเอียด').' : '.$model->id.' - '.Yii::t('app', Yii::$app->controller->module->params['title']);
		 
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new PersonJob model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		 Yii::$app->view->title = Yii::t('app', 'สร้างใหม่').' - '.$this->moduletitle;
		 
        $model = new PersonJob();

		/* if enable ajax validate
		if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
			Yii::$app->response->format = Response::FORMAT_JSON;
			return ActiveForm::validate($model);
		}*/
		
        if ($model->load(Yii::$app->request->post())) {
			if($model->save()){
                AdzpireComponent::succalert('addflsh', 'เพิ่มรายการเรียบร้อย');
			    return $this->redirect(['view', 'id' => $model->id]);
			}else{
                AdzpireComponent::dangalert('addflsh', 'เพิ่มรายการไม่ได้');
			}
            print_r($model->getErrors());exit;
        }

        $jobs = MainJob::getMainJobList();
        $personlist = PersonJob::getAvialablelist();
            return $this->render('create', [
                'model' => $model,
                'jobs' => $jobs,
                'personlist' => $personlist,
            ]);
        

    }

    /**
     * Updates an existing PersonJob model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		 $model = $this->findModel($id);
		 
		 Yii::$app->view->title = Yii::t('app', 'ปรับปรุงรายการ {modelClass}: ', [
    'modelClass' => 'Person Job',
]) . $model->id.' - '.$this->moduletitle;
		 
        if ($model->load(Yii::$app->request->post())) {
			if($model->save()){
                AdzpireComponent::succalert('edtflsh', 'ปรับปรุงรายการเรียบร้อย');
			    return $this->redirect(['view', 'id' => $model->id]);
			}else{
                AdzpireComponent::dangalert('edtflsh', 'ปรับปรุงรายการไม่ได้');
			}
            print_r($model->getErrors());exit();
        }

        $personlist = PersonJob::getAvialablelist($model->person_id);
        $jobs = MainJob::getMainJobList();
            return $this->render('update', [
                'model' => $model,
                'personlist' => $personlist,
                'jobs' => $jobs,
            ]);
        

    }

    /**
     * Deletes an existing PersonJob model.
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
     * Finds the PersonJob model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PersonJob the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PersonJob::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('ไม่พบหน้าที่ต้องการ.');
        }
    }
}
