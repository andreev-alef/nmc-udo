<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use TCPDF;

$nmc_db = new mysqli('192.168.0.2', 'nmc42', 'wasd---===', 'nmc42test');

$user_id = filter_input(INPUT_GET, 'userid');
//$user_id = 13;
$sql = 'select nmc42mdl_grade_grades.id,'
        . 'nmc42mdl_user.lastname, nmc42mdl_user.firstname, '
        . 'nmc42mdl_grade_items.itemname, '
        . 'nmc42mdl_grade_grades.finalgrade, '
        . 'nmc42mdl_grade_grades.timemodified '
        . 'from nmc42mdl_grade_items, nmc42mdl_grade_grades, nmc42mdl_user '
        . 'where nmc42mdl_grade_items.id=nmc42mdl_grade_grades.itemid '
        . 'and nmc42mdl_user.id=nmc42mdl_grade_grades.userid '
        . 'and nmc42mdl_grade_grades.userid=' . $user->id . ' '
        . 'and nmc42mdl_grade_items.courseid=4 '
        . 'and nmc42mdl_grade_grades.finalgrade is not null '
        . 'and nmc42mdl_grade_items.itemname is not null '
        . 'AND nmc42test.nmc42mdl_grade_grades.timemodified >= (UNIX_TIMESTAMP(NOW())-TIME_TO_SEC(NOW()))'
        . 'order by nmc42mdl_grade_items.id;';
//$nmc_result = $nmc_db->query($sql);
//$data_rows = $nmc_result->fetch_all(MYSQLI_ASSOC);
$N = 5;
$summ = 0;
$file_name = $user->lastname . '_' . $user->firstname . '.pdf';


$my_pdf = new TCPDF('P', 'mm', 'A4', TRUE, 'UTF-8');
$my_pdf->SetMargins(15, 15);
$my_pdf->setPrintHeader(FALSE);
$my_pdf->setPrintFooter(FALSE);
$my_font = TCPDF_FONTS::addTTFfont('./fonts/PTF55F.ttf');
$my_font = TCPDF_FONTS::addTTFfont('./fonts/PTF56F.ttf');
$my_font = TCPDF_FONTS::addTTFfont('./fonts/PTF75F.ttf');
$my_pdf->SetFont('PTF55F', '', 14, '', FALSE);
$my_pdf->AddPage();
$my_pdf->SetXY(20, 20);
$my_pdf->SetDrawColor(0, 255, 0);
$my_pdf->SetTextColor(0, 0, 0);

$html = '<style>table, td{border: #000 solid 2mm; padding: 2mm} td{padding: 5mm}</style>';
$html = $html . '<h1 style="font-size: 18pt; text-align: center;">Результаты квалификационных испытаний</h1>';
$html = $html . '<p> </p><p>' . $user->lastname . '&nbsp;' . $user->firstname . '</p>';
$html = $html . '<p>Дата:&nbsp;' . date('d.m.Y', $user->timemodified) . '</p>';
$html = $html . '<p><table class="result" border="1">';
$html = $html . '<tr border="1">';
$html = $html . '<td border="1" width="80%" align="center"><span style="font-family:PTF75F">Наименование</span></td>';
$html = $html . '<td border="1" width="20%" align="center"><span style="font-family:PTF75F">Качество<br />по модулю</span></td>';
$html = $html . '</tr>';
for ($i = 0; $i < $N; $i++) {
    $html = $html . '<tr>';
//    $html = $html . '<td border="1">' . str_replace('УПРАВЛЕНИЕ ПРОЦЕССАМИ.', 'УПРАВЛЕНИЕ ПРОЦЕССАМИ.<br />', $data_rows[$i]['itemname']) . '</td>';
    $html = $html . '<td border="1">' . $data_rows[$i]['itemname'] . '</td>';
    $html = $html . '<td border="1">' . sprintf('%.2f%%', $data_rows[$i]['finalgrade']) . '</td>';
    $summ += $data_rows[$i]['finalgrade'];
    $html = $html . '</tr>';
}
$html = $html . '<tr>';
$html = $html . '<td border="1"><span style="font-family:PTF75F">Качество исполнения теста</span></td>';
$html = $html . '<td border="1"><span style="font-family:PTF75F">' . sprintf('%.2f%%', $summ / $N) . '</span></td>';
$html = $html . '</tr>';
$html = $html . '</table></p>';
$html = $html . '<p> <p>С результатами испытаний ознакомлен(а)&nbsp;<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></p>';
$html = $html . '<p> <p>подпись&nbsp;<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>&nbsp;&nbsp;дата <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></p>';
//$my_pdf->MultiCell($w = 19.6, $h = 4.5, $txt = "Код", $border = array('LTRB' => array('width' => 0.1)), $align = 'L', $fill = 0, $ln = 10, $x = '', $y = '', $reseth = true, $stretch = 0, $ishtml = false, $autopadding = true, $maxh = $h, $valign = 'M', $fitcell = true);

$my_pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
$my_pdf->Output($file_name);
