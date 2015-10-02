<?php
// Class
class testClassee {

    private $array;



    // Als class runt deze automatisch
    public function __construct(){
        $this->array = (object) array(
            "naam" => "mert",
            "array2" => (object) array(
                'papa' => 'Hoi'
            )
        );
    }

    // Register
    public function register(){
          echo ucfirst($this->array->naam);
    }


    // Sluit class af
    public function __destruct(){

    }

}

$class = new testClassee();

$class->register();
?>


