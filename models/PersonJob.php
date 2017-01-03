<?php

namespace backend\modules\mainjob\models;

use Yii;
use backend\modules\mainjob\models\MainJob;
use backend\modules\mainjob\models\Person;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use wowkaster\serializeAttributes\SerializeAttributesBehavior;
/**
 * This is the model class for table "person_job".
 *

 * @property integer $id
 * @property integer $person_id
 * @property string $job
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $updated_by
 * @property Person $person
 */
class PersonJob extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person_job';
    }

    public function behaviors()
    {
        return [
            BlameableBehavior::className(),
            TimestampBehavior::className(),
            [
                'class' => SerializeAttributesBehavior::className(),
                'convertAttr' => ['job' => 'json']
            ]
        ];
    }
    public $personName;
    /*add rule in [safe]
    'personName',
    join in searh()
    $query->joinWith(['person', ]);*/    /**
 * @inheritdoc
 */
    public function rules()
    {
        return [
            [['person_id', 'job'], 'required'],
            [['person_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['job'], 'safe'],
            ['job', 'each', 'rule' => ['integer']],
            [['person_id'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['person_id' => 'user_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'person_id' => 'บุคลากร',
            'job' => 'งาน',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(Person::className(), ['user_id' => 'person_id']);

        /*
        $dataProvider->sort->attributes['personName'] = [
            'asc' => ['person.name' => SORT_ASC],
            'desc' => ['person.name' => SORT_DESC],
        ];

        ->andFilterWhere(['like', 'person.name', $this->personName])
        ->orFilterWhere(['like', 'person.name1', $this->personName])
                    in grid
        [
            'attribute' => 'personName',
            'value' => 'person.name',
            'label' => $searchModel->attributeLabels()['person_id'],
            'filter' => \Person::personList,
        ],

        in view
        [
            'label' => $model->attributeLabels()['person_id'],
            'value' => $model->person->name,
            //'format' => ['date', 'long']
        ],
        */
    }

    public function getPersonJobList(){
        return ArrayHelper::map(self::find()->all(), 'id', 'title');
    }

    public function getJobInfoList(){
        $courseli = '<ul>';

        foreach ($this->job as $key) {
            if (!empty($key)) {
                $courseli .= '<li>' . MainJob::findOne($key)->stc_name . '</li>';
            }
        }
        $courseli .= '</ul>';

        return $courseli;
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
