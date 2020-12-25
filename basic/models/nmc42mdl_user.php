<?php
namespace app\models;

use yii\db\ActiveRecord;

class Nmc42mdl_user extends ActiveRecord{
    public static function getDb(){
        return \Yii::$app->nmcMoodleAttestDB;
    }
}