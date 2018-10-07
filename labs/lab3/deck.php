<?php
    require_once('card.php');

    class Deck{
        private $deck=array(); //an array full of Cards
        private $size = 0;
        
        function __construct() {
            $this->deck = array();
            $this->size = 0;
            for ($i = 1; $i < 14; $i++){
                array_push($this->deck, new Card("./img/hearts/".$i.".png", $i));
                $this ->size++;
                array_push($this->deck, new Card("./img/diamonds/".$i.".png", $i));
                $this ->size++;
                array_push($this->deck, new Card("./img/clubs/".$i.".png", $i));
                $this ->size++;
                array_push($this->deck, new Card("./img/spades/".$i.".png", $i));
                $this ->size++;
            }
            shuffle($this -> deck);
        }
        
        public function drawCard()
        {
            
            $card = array_pop($this -> deck);
            $this->size = $this->size - 1;
            return $card;
        }
        
        public function getSize()
        {
            return $this -> size;
        }
        
    }
?>