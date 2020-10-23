<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class Test extends Model {

    public $famil;

    public function rules() {
        return [
            [['famil'], 'required'],
        ];
    }

}
