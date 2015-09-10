<?php
class Categories {

    /** @var object list of categories */
    private $categories;

    /**
     * Constructor for Categories
     */
    public function __construct() {
        // Global $config and $database
        global $config;
        global $database;
        // Get config table
        $query = $database->query("SELECT * FROM " . $config->db_tables->category);

        // Create empty object
        $categories = (object) array();
        // While loop for all categories
        foreach($query->fetchAll() as $row) {
            /** @var object $row The row as an object */
            $row = (object) $row;
            /** @var integer $id The category id */
            $id = $row->id;
            // Check if a sub category is set
            if($row->sub != 0) {
                /** @var integer $sub The sub category id */
                $sub = $row->sub;
                // Check if head exists
                if(!isset($categories->$sub)) {
                    // Setting initial head
                    $categories[$sub] = array();
                }
                // Adding the sub category to the object
                $categories[$sub]['sub'][$id] = $row;
            } else {
                // Adding the category to the object
                $categories[$id] = $row;
            }
        }
        // Putting the categories in the object
        $this->categories = $categories;
    }

    /**
     * Get all the categories
     * @return object
     */
    public function getAll() {
        return $this->categories;
    }

    /**
     * Get one category by id
     * @param string $id
     * @return bool|object
     */
    public function getOne($id = '') {
        /** @var array $id Exploded list of id */
        $id = explode(".", $id);
        /** @var string $string String to be eval'd */
        $string = '$this->categories';
        // Foreach exploded id
        foreach ($id as $i) {
            // Add it to the string to be eval'd
            $string .= '["' . $i . '"]"';
        }
        // Check if the category exist
        if (eval("if(isset($string)) return true; else return false;")) {
            // Return the category
            return eval("return $string;");
        }
        // The category doesn't exist
        return false;
    }

}