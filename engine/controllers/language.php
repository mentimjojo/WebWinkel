<?php
// Language class
class Language {

    private $lang;
    private $path;

    public function __construct($lang = 'en', $path = '') {
        global $config;

        $this->lang = $lang;
        if($path) {
            $this->path = $path;
        } else {
            $this->path = $config->path->language . '/' . $lang;
        }
    }

    public function get($)

}