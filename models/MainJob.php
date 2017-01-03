<?php

namespace adzpire\job\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "main_job".
 *
 
 * @property integer $stc_id
 * @property string $stc_name
 * @property string $stc_name_eng
 * @property string $stc_detail
 */
class MainJob extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'main_job';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stc_name', 'stc_name_eng', 'stc_detail'], 'required'],
            [['stc_detail'], 'string'],
            [['stc_name', 'stc_name_eng'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'stc_id' => 'Stc ID',
            'stc_name' => 'Stc Name',
            'stc_name_eng' => 'Stc Name Eng',
            'stc_detail' => 'Stc Detail',
        ];
    }

public static function getMainJobList(){
		return ArrayHelper::map(self::find()->all(), 'stc_id', 'stc_name');
	}

/*
public static function itemsAlias($key) {
        $items = [
            'status' => [
                0 => Yii::t('app', 'ร่าง'),
                1 => Yii::t('app', 'เสนอ'),
                2 => Yii::t('app', 'อนุมัติ'),
                3 => Yii::t('app', 'ไม่อนุมัติ'),
                4 => Yii::t('app', 'คืนแล้ว'),
            ],
            'statusCondition'=>[
                1 => Yii::t('app', 'อนุมัติ'),
                0 => Yii::t('app', 'ไม่อนุมัติ'),
            ]
        ];
        return ArrayHelper::getValue($items, $key, []);
    }

    public function getStatusLabel() {
        $status = ArrayHelper::getValue($this->getItemStatus(), $this->status);
        $status = ($this->status === NULL) ? ArrayHelper::getValue($this->getItemStatus(), 0) : $status;
        switch ($this->status) {
            case 0 :
            case NULL :
                $str = '<span class="label label-warning">' . $status . '</span>';
                break;
            case 1 :
                $str = '<span class="label label-primary">' . $status . '</span>';
                break;
            case 2 :
                $str = '<span class="label label-success">' . $status . '</span>';
                break;
            case 3 :
                $str = '<span class="label label-danger">' . $status . '</span>';
                break;
            case 4 :
                $str = '<span class="label label-succes">' . $status . '</span>';
                break;
            default :
                $str = $status;
                break;
        }

        return $str;
    }

    public static function getItemStatus() {
        return self::itemsAlias('status');
    }
    
    public static function getItemStatusConsider() {
        return self::itemsAlias('statusCondition');       
    }
*/
}
