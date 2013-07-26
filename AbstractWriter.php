<?php

namespace BasicExcel;

Abstract Class AbstractWriter {

    protected $handle;

    public function writeFile($filename) {
        $this->handle = @fopen($this->filename($filename), 'w+');
        if (!$this->handle) {
            throw new \BasicExcel\Exception("Could not open $filename for writing");
        }
        $this->write($this->filename($filename));
        return $this->filename($filename);
    }

    public function download($filename) {
        $this->handle = @fopen("php://output", 'w');
        if (!$this->handle) {
            throw new \BasicExcel\Exception("Could not open php://output for writing");
        }
        $this->headers($this->filename($filename));

        $this->write($this->filename($filename));
    }

    /**
     * Safely encode a string for use as a filename
     * @param string $title The title to use for the file
     * @return string The file safe title
     */
    public function filename($title) {
        $result = strtolower(trim($title));
        $result = str_replace("'", '', $result);
        $result = preg_replace('#[^a-z0-9_.]+#', '-', $result);
        $result = preg_replace('#\-{2,}#', '-', $result);
        return preg_replace('#(^\-+|\-+$)#D', '', $result);
    }

}