<?php
function connexionDB()
{
    $host="localhost";
    $port="3306";
    $database="contacts";
    $user="root";
    $password="";
    $dburl="mysql:host=".$host.";port=".$port."charset=utf8;dbname=".$database;
    $pdo_options [PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO ( $dburl, $user, $password, $pdo_options );
    return $bdd;
    // $bdd->exec ( "SET CHARACTER SET utf8" );
}

function sanitaze($var)
{
    $r = isset($var) ? htmlspecialchars(trim($var)) : "";
    
    // TODO : on doit faire ...
    
    return $r;
}

/**
 * Neutralise la chaine de caractÃ¨re envoyÃ©e par POST
 */
function sanitazePost($var)
{
    $r = isset($_POST[$var]) ? sanitaze($_POST[$var]) : "";
    
    return $r;
}

/**
 * Neutralise la chaine de caractÃ¨re envoyÃ©e par GET
 */
function sanitazeGet($var)
{
    $r = isset($_GET[$var]) ? sanitaze($_GET[$var]) : "";
    
    return $r;
}

function printCheckBox($key, $lab){
    
    $check = '<div class="form-check">
    <input  name="group[]"   class="form-check-input" type="checkbox" value="'.$key .'">
    <label class="form-check-label"> '.$lab .' </label>
			</div>';
    
    echo $check;
}
function getuser()
{
    
    $result = array();
    
    try{
        
        $bd = connexionDB();
        $stmt = $bd->prepare('select  * from personne ');
        $stmt->execute();
        while($data = $stmt->fetch()){
            $result[]   = $data;
        }
        
        
    }catch (Exception $ex){
        echo "ERROR";
    }
    
    return $result;
    
}


