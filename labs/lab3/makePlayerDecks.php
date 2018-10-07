<?php
    class Player{
        private $hand;
        private $points;
        private $name;
        private $image;
        
        function __construct() {
            $this->hand = array();
            $this->points = 0;
            $this->name = "";
            $this->image = array();
        }
        
        // get points function
        public function getPoints() {
            return $this->points;
        }
        // set points function
        public function setPoints($num) {
            $this->points += $num;
        }
        
        // get card array function
        public function getHand() {
            return $this->hand;
        }
        // set card array function
        public function setHand($card) {
            array_push($this->hand, $card);
        }
        
        // get player name function
        public function getName() {
            return $this->name;
        }
        // set player name function
        public function setName($name) {
            $this->name = $name;
        }
        //get player image
        public function getImg(){
            return $this->image;
        }
        //set player image
        public function setImg($image){
            $this->image = $image;
        }
    } 

?>

<?php

    // returns an array of type Player
    // each index is a Player which has the hand and points for the players
    function getPlayers() {
        require_once('deck.php');
    
        $deck = new Deck();
        $allPlayers = array();
        #the names can be changed to whatever you want, just went with the OG spongebob
        //$playerNames = array("Spongebob", "Patrick", "Old man Jenkins", "Where's my diet Dr. Kelp dude");
        $playerNames = array("Spongebob", "Patrick", "Old man Jenkins", "Where's my diet Dr. Kelp dude");
        $playerImage=array("0.jpg", "1.jpg", "2.jpg", "3.jpg");
        
        for($i = 0; $i < 4; $i++) {
            $player = new Player();
            $player->setName($playerNames[$i]);
            $player->setImg($playerImage[$i]);
            while($player->getPoints() < 35) {
                $newCard = $deck->drawCard();
                $player->setHand($newCard);
                $player->setPoints($newCard->getPoints());
            }
            array_push($allPlayers, $player);
            
        }
        shuffle($allPlayers);
        return $allPlayers;
    }
    
?>