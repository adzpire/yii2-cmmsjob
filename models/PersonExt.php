<?php

namespace backend\modules\mainjob\models;


class PersonExt extends \backend\modules\person\models\Person
{

    //adzpire
    public function getJob(){
        return $this->hasOne(PersonJob::className(), ['person_id' => 'user_id']);
    }
}