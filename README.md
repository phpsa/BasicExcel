BasicExcel
==========

Lightweight Basic Excel Read / Writer for PHP 5.3+


This Class can both read and write to CSV, XLS and XLSX.
Added in the abiliity to guess which file type it is and parse accordingly to array

Examples - Reading
===================
1) From a file

```php
   try {
	$xmldata = \BasicExcel\Reader::readFile('/path/to/abc.csv'); //or abc.xls or abc.xlsx
    echo '<pre>' . print_r($xmldata->toArray() , 1) . '</pre>';
   }catch(Exception $e){
	echo $e->getMessage();
	exit;
   }
```

2) from an upload
```php
   try {
	$xmldata = \BasicExcel\Reader::readUpload($_FILES['upload']);
    echo '<pre>' . print_r($xmldata->toArray() , 1) . '</pre>';
   }catch(Exception $e){
	echo $e->getMessage();
	exit;
   }
```
  
3) You can even get the file type if that is all you seek.  
```php
   try {
	$type = \BasicExcel\Reader::identify('/path/to/file');
	echo $type;
   }catch(Exception $e){
	echo $e->getMessage();
	exit;
   }
```

Examples - Writing
==================
1) write a csv / xls / xlsx from an array
```php
$data = array(
    array('Nr.', 'Name', 'E-Mail'),
    array(1, 'Jane Smith', 'jane.smith@fakemail.com'),
    array(2, 'John Smith', 'john.smith@fakemail.com'));
		
   try {
	$csvwriter = new \BasicExcel\Writer\Csv(); //or \Xsl || \Xslx
	$csvwriter->fromArray($data);
	$csvwriter->writeFile('myfilename.csv');
	//OR
	$csvwriter->download('myfilename.csv');
   }catch(Exception $e){
	echo $e->getMessage();
	exit;
   }
```
   
2)Usingn XLS or XLSX you can have multiple sheets.
```php

$data = array(
    'Names' => array(
        array('Nr.', 'Name', 'E-Mail'),
        array(1, 'Jane Smith', 'jane.smith@fakemail.com'),
        array(2, 'John Smith', 'john.smith@fakemail.com')
    ),
    'Ages' => array(
        array('Nr.', 'Age'),
        array(1, 103),
        array(2, 21)
    ),
    'Genders' => array(
        array('Nr.', 'Gender'),
        array(1, 'Male'),
        array(2, 'Female')
    )
);
		
   try {
	$csvwriter = new \BasicExcel\Writer\Xls(); //or \Xslx
	$csvwriter->fromArray($data);
	$csvwriter->writeFile('myfilename.csv');
	//OR
	$csvwriter->download('myfilename.csv');
   }catch(Exception $e){
	echo $e->getMessage();
	exit;
   }
```


Full documentation available soon at http://www.omnihost.co.nz
   