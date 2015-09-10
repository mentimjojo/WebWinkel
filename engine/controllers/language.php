<?php

/**
 * Class Language
 */
class Language {

    private $lang;
    private $path;
    private $data;

    /**
     * Construct the language object
     * @param string $lang
     * @param string $path
     */
    public function __construct($lang, $path = '') {
        global $config;

        $this->lang = $lang;
        if($path) {
            $this->path = $path;
        } else {
            $this->path = BASEDIR . '/engine/' . $config->language->path . '/' . $lang . '.php';
        }
        if(!file_exists($this->path)) {
            die('The language path does\'t exist');
        } else {
            $this->data = require $this->path;
        }
    }


    /**
     * Get translated string
     * @param string $pkey
     * @return string
     */
    public function get($pkey = '', $replace = array()) {
        $keys = explode('.', $pkey);
        $keystring = '$this->data->strings';
        foreach($keys as $key) {
            $keystring .= "->".$key;
        }
        if(eval("if(isset($keystring)) return true; else return false;")) {
            $string = eval("return " . $keystring . ";");
            foreach ($replace as $k => $v) {
                $string = str_replace(':' . $k . ':', $v, $string);
            }
            return $string;
        } else {
            return '<span style="color: red;">' . $pkey . '</span>';
        }
    }

}