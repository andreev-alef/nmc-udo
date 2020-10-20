<?php

namespace app\models;

use Yii;
use yii\base\Model;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;



class FilterForm extends Model
{
        public $famil;
        public $gos_nomer;
        public $reg_nomer;
        public $tema;
}