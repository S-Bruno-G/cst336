<?php
    class Card{
        private $imgLink;
        private $points;
        
        function __construct($dir, $num) {
            $this->imgLink = $dir;
            $this->points = $num;
        }
        
        // get points function
        public function getPoints()
        {
            return $this->points;
        }
        
        // get image link function
        public function getImg()
        {
            return $this->imgLink;
        }
    }  
?>