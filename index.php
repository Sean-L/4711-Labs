<?php
if (!isset($_GET['board'])){
    echo "Board value not set";
}else{
    $position = $_GET["board"];
    $squares = chr(str_split($postion));
    
    echo $squares[0].'<br/>';
    echo $squares[1].'<br/>';
    echo $squares[2].'<br/>';
    echo $squares[3].'<br/>';
    echo $squares[4].'<br/>';
    echo $squares[5].'<br/>';
    echo $squares[6].'<br/>';
    echo $squares[7].'<br/>';
    echo $squares[8].'<br/>';
    
    if (winner('x',$squares)){
        echo 'You win.';
    }elseif(winner('o', $squares)){
        echo 'I win.';
    }else{
        echo 'No winner yet.';
    }
}
function winner($token, $squares){
    $won = false;
    if(($squares[0] === $token) && ($squares[1] === $token) && ($squares[2] === $token)){
        $won = true;
    }elseif(($squares[0] === $token) &&($squares[3] === $token) && ($squares[6] === $token)){
        $won = true;
    }elseif(($squares[0] === $token) &&($squares[4] === $token) && ($squares[8] === $token)){
        $won = true;
    }elseif(($squares[1] === $token) &&($squares[4] === $token) && ($squares[7] === $token)){
        $won = true;
    }elseif(($squares[2] === $token) &&($squares[4] === $token) && ($squares[6] === $token)){
        $won = true;
    }elseif(($squares[2] === $token) &&($squares[5] === $token) && ($squares[8] === $token)){
        $won = true;
    }elseif(($squares[3] === $token) &&($squares[4] === $token) && ($squares[5] === $token)){
        $won = true;
    }elseif(($squares[6] === $token) &&($squares[7] === $token) && ($squares[8] === $token)){
        $won = true;
    }
    return $won;
}
?>