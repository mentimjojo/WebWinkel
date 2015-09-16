<?php
class Categories {

    /** @var object list of categories */
    public $categories;
    public $subcategories;

    /**
     * Constructor for Categories
     */
    public function __construct() {
        $this->setCat();
        $this->setSub();
    }

    public function setCat() {
        // Global $config and $database
        global $config;
        global $database;
        // Get config table
        $query = $database->query("SELECT * FROM " . $config->db_tables->category);

        // Create empty object
        $categories = array();
        // While loop for all categories
        foreach($query->fetchAll() as $row) {
            /** @var object $row The row as an object */
            $row = (object) $row;
            /** @var integer $id The category id */
            $id = $row->id;

            // Set the categories
            $categories[$id] = $row;
            // Check if a sub category is set
        }
        // Putting the categories in the object
        $this->categories = $categories;
    }

    public function setSub() {
        // Global $config and $database
        global $config;
        global $database;
        // Get config table
        $query = $database->query("SELECT * FROM " . $config->db_tables->subcategories);

        // Create empty object
        $subcategories = array();
        // While loop for all categories
        foreach($query->fetchAll() as $row) {
            /** @var object $row The row as an object */
            $row = (object) $row;
            /** @var integer $id The category id */
            $id = $row->id;

            // Set the categories
            $subcategories[$id] = $row;
            // Check if a sub category is set
        }
        // Putting the categories in the object
        $this->subcategories = $subcategories;
    }

    /**
     * Get all the categories
     * @return object
     */
    public function getAll() {
        return (object) array(
            'categories' => $this->categories,
            'sub' => $this->subcategories
        );
    }

    /**
     * Get one category by id
     * @param string $id
     * @return bool|object
     */
    public function getOne($id = '', $lang = 'en') {
        // Global $config
        global $config;
        /** @var array $id Exploded list of id */
        $id = explode(".", $id);
        /** @var string $string String to be eval'd */
        $string = $this->categories;
        // Foreach exploded id
        foreach ($id as $i) {
            // Add it to the string to be eval'd
            $string = $string[$i];
        }
        // Temporary object -> array
        $tstring = (array) $string;
        // Set ->name to equal current lang
        $string->name = $tstring['name_'.$config->language->current];
        // Check if the category exist
        return (object) $string;
        // The category doesn't exist
        return false;
    }

    public function getSubs($cat_id = 0) {

    }

}