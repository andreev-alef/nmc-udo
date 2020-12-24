<?php
namespace app\models;

use yii\db\ActiveRecord;

class Attest extends ActiveRecord{
    public static function getDb(){
        return \Yii::$app->nmcMoodleAttestDB;
    }
}