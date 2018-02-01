<?php

namespace backend\modules\mainjob\controllers;

use Yii;
use backend\modules\mainjob\models\MainJobSearch;
use backend\modules\mainjob\models\PersonJobSearch;

use yii\web\Controller;
use yii\helpers\Url;
/**
 * Default controller for the `mainjob` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public $modul;
    public function beforeAction($action){
        //$this->checkperson = Person::findOne([Yii::$app->user->id]);
        $this->modul = \Yii::$app->controller->module;
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        Yii::$app->view->title = Yii::t('app', 'รายการ').' - '.$this->modul->params['title'];

        $searchModel = new MainJobSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $pjmdl = new PersonJobSearch();
        $pjdataProvider = $pjmdl->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            '$pjmdl' => $pjmdl,
            'pjdataProvider' => $pjdataProvider,
        ]);
    }

    public function actionReadme()
    {
        return $this->render('readme');
    }
    public function actionChangelog()
    {
        return $this->render('changelog');
    }
    public function actionSetvercookies()
    {
        $cookie = \Yii::$app->response->cookies;
        $cookie->add(new \yii\web\Cookie([
            'name' => $this->modul->params['modulecookies'],
            'value' => $this->modul->params['ModuleVers'],
            'expire' => time() + (60*60*24*30),
        ]));
        $this->redirect(Url::previous());
    }
}
