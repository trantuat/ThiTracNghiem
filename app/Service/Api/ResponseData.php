<?php
    namespace App\Service\Api;
    
    class ResponseData 
    {
        public $data;
        public $error;

        public function __construct($data,$error) 
        {
            $this->data = $data;
            $this->error = $error;
        }
    }
?>