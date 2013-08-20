<?php

namespace BasicExcel\Writer;

Class Csv extends \BasicExcel\AbstractWriter{

    public $delimter = ",";
    public $enclosure = '"';
    public $sheets = array();

    public function __construct($delimter = ",", $enclosure = '"') {
        $this->delimter = $delimter;
        $this->enclosure = $enclosure;
    }

    public function addCell($row, $cell, $value) {
        $this->sheets[$row][$cell] = $value;
        return $this;
    }

    public function addRow($row, $array) {
        $this->sheets[$row] = $array;
        return $this;
    }

    public function fromArray($array) {

        $this->sheets = array(
            $array
        );
        return $this;
        //fputcsv ( resource $handle , array $fields [, string $delimiter = ',' [, string $enclosure = '"' ]] )
    }

    public function addWorksheet($title, $data) {
        if (count($this->sheets) > 0) {
            throw new \BasicExcel\Exception("CSV can only be a single sheet");
        }
        $this->sheets = array(
            $title => $data
        );
        return $this;
    }

    protected function headers($filename) {
        header("Content-Type:application/csv");
        header("Content-Disposition:attachment;filename=" . $filename);
    }

    protected function write($filename) {
        $rows = $this->sheets[0];
     
        foreach ($rows as $row) {
            fputcsv($this->handle, $row, $this->delimter, $this->enclosure);
        }
        if (!fclose($this->handle)) {
            throw new \BasicExcel\Exception("Could not close handle");
        }
        
    }

}