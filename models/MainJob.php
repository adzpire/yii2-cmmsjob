<?php

namespace backend\modules\mainjob\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

use backend\modules\person\models\Person;
/**
 * This is the model class for table "main_job".
 *
 
 * @property integer $stc_id
 * @property string $stc_name
 * @property string $stc_name_eng
 * @property string $stc_detail
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
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

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stc_name'], 'required'],
            [['stc_detail'], 'string'],
            [['stc_name', 'stc_name_eng'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['created_by' => 'user_id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['updated_by' => 'user_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'stc_id' => 'ID',
            'stc_name' => 'ชื่องาน(ไทย)',
            'stc_name_eng' => 'ชื่องาน(อังกฤษ)',
            'stc_detail' => 'รายละเอียด',
            'created_at' => 'สร้างเมื่อ',
            'created_by' => 'สร้างโดย',
            'updated_at' => 'อัพเดตเมื่อ',
            'updated_by' => 'อัพเดตโดย',
        ];
    }

public static function getMainJobList(){
		return ArrayHelper::map(self::find()->all(), 'stc_id', 'stc_name');
	}
    public function getCreatedBy()
    {
        return $this->hasOne(Person::className(), ['user_id' => 'created_by']);
    }
    public function getUpdatedBy()
    {
        return $this->hasOne(Person::className(), ['user_id' => 'updated_by']);
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
