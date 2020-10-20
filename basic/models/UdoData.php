<?php

namespace app\models;

use Yii;
use yii\base\Model;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class UdoData extends Model {

    private $udo_path = "c:\\Users\\typo\\Documents\\!!ГОС_ДИП_УД\\УДОСТОВЕРЕНИЯ_ДАННЫЕ\\удостоверения.xlsx";
//    public $udo_path = "c:\\Users\\alef\\Documents\\!!ГОС_ДИП_УД\\УДОСТОВЕРЕНИЯ_ДАННЫЕ\\удостоверения.xlsx";

    public function getAllData() {
        $reader = new Xlsx();
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($this->udo_path);
        return $spreadsheet->getSheetByName("УДОСТОВЕРЕНИЯ");
    }

    public function getCellData($coordinate = 'A1') {
        $reader = new Xlsx();
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($this->udo_path);
        return $spreadsheet->getSheetByName("УДОСТОВЕРЕНИЯ")->getCell($coordinate)->getCalculatedValue();
    }
    
    

}
