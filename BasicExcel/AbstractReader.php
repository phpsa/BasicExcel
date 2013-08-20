<?php

namespace BasicExcel;

Abstract Class AbstractReader {

    protected $fileHandle = NULL;
    
    protected $sheets = array();

    protected function openFile($filename) {
        if (!file_exists($filename) || !is_readable($filename)) {
            throw new\BasicExcel\Exception("Could not open " . $filename . " for reading! File does not exist.");
        }

        // Open file
        $this->fileHandle = fopen($filename, 'r');
        if ($this->fileHandle === FALSE) {
            throw new\BasicExcel\Exception("Could not open file " . $filename . " for reading.");
        }
    }

    public function canRead($filename) {
        try {
            $this->openFile($pFilename);
        } catch (\BasicExcel\Exception $e) {
            return FALSE;
        }

        $readable = $this->isValidFormat($filename);
        fclose($this->fileHandle);
        return $readable;
    }
    
    

}