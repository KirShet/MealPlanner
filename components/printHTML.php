<?php
function сreatInput($name, $p, $type ="text", $class="call", $value = "", $textField = 'input') {
    ?>
    <?if($class=='call'){?>
        <div class="calintakestring1">
            <p><?=$p?></p>
        </div>
    <?}?>
            <<?=$textField?> 
            type="<?=$type?>" 
            class="<?=$class?>" 
            id="quantity" 
            name="<?=$name?>"
            placeholder="<?=$p?>"
            value = "<?=$value?>"
            ><?if($textField != 'input')echo $value.'</'.$textField.'>';?>
            <?=(isset($_SESSION['errors'][$name])) ? "<br><span>{$_SESSION['errors'][$name]}</span>" : "" ?>
            <?unset($_SESSION['errors'][$name]);?>
    <?php
}

function printError(){
    if(isset($_SESSION["errorForm"])){
        // foreach($_SESSION["errors"] as $key => $value){
            echo "<div class='calintakestring1'><p>{$_SESSION["errorForm"]}</p></div>";
        // }
        unset($_SESSION["errorForm"]);
    }
}
?>