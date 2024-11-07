<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Excel {
    public function __construct() {
        include_once APPPATH . 'third_party/PHPExcel/Classes/PHPExcel.php';
    }
}





// <?//php if (!defined('BASEPATH')) exit('No direct script access allowed');

// class Excel {

//     public function __construct() {
//         require_once APPPATH . 'third_party/PHPExcel/Classes/PHPExcel.php';
//     }

//     public function load($filename) {
//         $objReader = PHPExcel_IOFactory::createReaderForFile($filename);
//         $objPHPExcel = $objReader->load($filename);
//         return $objPHPExcel;
//     }
// }
