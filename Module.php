<?php

namespace adzpire\job;

/**
 * mainjob module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'adzpire\job\controllers';

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
                'basePath' => 'adzpire/job/mainjob/messages'
            ];
        }
		*/
		parent::init();

		$this->layout = 'mainjob';
		$this->params['ModuleVers'] = '1.0.0';
		$this->params['title'] = 'mainjob';
        // custom initialization code goes here
    }
}
