<?php ini_set('display_errors', 'On');
 error_reporting(E_ALL);
if (!isset($_GET['board'])){
    echo "Board value not set";
}else{
    $position = filter_input(INPUT_GET ,'board');
    $game = new Game($position);
    
    $game->display();
    if ($game->winner('x')){
        echo 'You win. Lucky guesses.';
        
    }elseif($game->winner('o')){
        echo 'I win. Muahahaha!';
    }else{
        echo 'No winner yet, but you are losing';
    }
}

class Game{
    var $sq = [' ', ' '];
        function __construct($position){
         $this->sq = str_split($position);
    }
	function winner($token){
        for($row = 0; $row<3; $row++){
            if(($this->sq[$row*3] === $token) && ($this->sq[$row*3+1]) && ($this->sq)){
                $won = true;
            }
        }
        for($column = 0; $column<3; $column++){
            if(($this->sq[$column] === $token) && ($this->sq[$column+3] ===$token)&&($this->sq[$column+6]=== $token)){
                $won=true;
            }
        }
        if(($this->sq[0]===$token) && ($this->sq[4]===$token) &&($this->sq[8]===$token)){
            $won=true;
        }
        if(($this->sq[2]===$token) && ($this->sq[4]===$token) &&($this->sq[6]===$token)){
            $won=true;
        }
        return $won;
    }
    function display(){
        echo '<table cols="3" style="font-size:large; font-weight:bold">';
        echo '<tr>';
        for($pos=0; $pos <9; $pos++){
            echo $this->show_cell($pos);
            if($pos % 3 ==2){
                echo '</tr><tr>';
            }
        }
        echo '</tr>';
        echo '</table>';
    }
    
    function show_cell($which) {
        $token = $this->sq[$which];
        if ($token <> '-'){
            return '<td>'.$token.'</td>';
        }
        $this->newpos = $this->sq;
        $this->newpos[$which] = 'o';
        $move = implode($this->newpos);
        $link = '/Lab1/4711-Labs/index.php/?board='.$move;
        return '<td><a href="'.$link.'">-</a></td>';
    }
    /*
    function boardcheck(){
        for($i = 0; $i<9; $i++){
            if($this->sq[$i] == '-'){
                return true;
            }
        }
        return false;
    }
    
    function turn(){
        if($this->boardcheck()){
            $p = rand(0,8);
            while($this->sq[$p]!= '-'){
                $p = rand(0,8);
            }
         
        }*/
}
?>