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
    public function __construct($lang = 'en', $path = '') {
        // Use the configuration
        global $config;

        // Set language
        $this->lang = $lang;

        // Check if there is a custom path
        if($path != '') {
            // Set custom path
            $this->path = $path;
        } else {
            // Set path
            $this->path = BASEDIR . '/' . $config->language->path . '/' . $lang . '.php';
        }
        // Check if language file exist
        if(!file_exists($this->path)) {
            // Exit if the language file doesn't exist
            die('The language path does\'t exist');
        } else {
            // Load the language
            $this->data = require $this->path;
            return true;
        }
    }

    /**
     * Get available languages
     * @return array
     */
    public function getLangs() {
        // Use the configuration
        global $config;

        // Path with language files
        $path = BASEDIR . '/' . $config->language->path . '/';
        // Init language files
        $langs = array();
        // Foreach language file
        foreach(glob($path.'*.php') as $lf) {
            // Get the language file name without .php
            $short = rtrim(end($lf), ".php");
            // Require the language file
            $data = require $lf;
            // Add the language to the array
            $langs[$short] = $data->name;
        }
        // Return the language array
        return $langs;
    }

    /**
     * Get translated string
     * @param string $pkey
     * @return string
     */
    public function get($pkey = '', $replace = array()) {
        // Explode the key
        $keys = explode('.', $pkey);
        // Set the base variable
        $keystring = '$this->data->strings';
        // For each keys (multi array)
        foreach($keys as $key) {
            // Add the key to the variable
            $keystring .= "->".$key;
        }
        // Get the string
        $string = eval("return " . $keystring . ";");
        // Foreach replaces
        foreach($replace as $k=>$v) {
            // Replace the replace
            $string = str_replace(':'.$k.':', $v, $string);
        }
        // If string is set
        if($string) {
            // Return the string
            return $string;
        } else {
            // Return the key
            return $pkey;
        }
    }

}