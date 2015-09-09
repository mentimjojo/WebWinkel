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
        } else {
            $this->data = require $this->path;
        }
    }

    public function get($pkey = '') {
        $keys = explode('.', $pkey);
        $keystring = '$this->data->strings';
        foreach($key as $key) {
            $keystring .= "['".$key."']'";
        }
        $string = eval("return " . $keystring . ";");
        if($string) {
            return $string;
        } else {
            return $pkey;
        }
    }

}