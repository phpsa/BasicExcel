BasicExcel
==========

Lightweight Basic Excel Read / Writer for PHP 5.3+


This Class can both read and write to CSV, XLS and XLSX.
Added in the abiliity to guess which file type it is and parse accordingly to array

Examples - Reading
===================

   try {
	$xmldata = \BasicExcel\Reader::readFile('/path/to/abc.csv');
    echo '<pre>' . print_r($xmldata->toArray() , 1) . '</pre>';
   }catch(Exception $e){
	echo $e->getMessage();
	exit;
   }