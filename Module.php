<?php

namespace backend\modules\mainjob;

/**
 * mainjob module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'backend\modules\mainjob\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
		/*
		Yii::$app->formatter->locale = 'th_TH';
		Yii::$app->formatter->calendar = \IntlDateFormatter::TRADITIONAL;
		
		 if (!isset(Yii::$app->i18n->translations['repair'])) {
            Yii::$app->i18n->translations['repair'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'sourceLanguage' => 'en',
                'basePath' => 'backend\modules\mainjob/mainjob/messages'
            ];
        }
		*/
		parent::init();

		$this->layout = 'mainjob';
		$this->params['ModuleVers'] = '1.1';
		$this->params['title'] = 'ข้อมูลโครงสร้างงาน';
        $this->params['modulecookies'] = 'mainjobck';
        // custom initialization code goes here
    }
}
