<?php
// Language class
class Language {

    private $lang;
    private $path;
    private $data;

    public function __construct($lang = 'en', $path = '') {
        global $config;

        $this->lang = $lang;
        if($path) {
            $this->path = $path;
        } else {
            $this->path = BASEDIR . '/' . $config->lang->path . '/' . $lang;
        }
        if(!file_exists($this->path)) {
            die('The language path does\'t exist');
        }
    }

    public function get($key = '') {

    }

    public function listLanguages() {

    }

}