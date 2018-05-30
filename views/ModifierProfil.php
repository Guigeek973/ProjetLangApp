<?php

$title="Profil";
start_page_min($title);

$data = getInfosProfil();
$lang = getInfosLanguages();
$allLang = getAllLanguages();
$allLevel = getAllLevel();
?>
<div class="container-fluid">
    <div class="text-center">
        <h4 class="profil">Your profile</h4>
    </div>
    <div class="column">
        <div class="col-md-4 col-md-offset-4">
            <h5>Your profile picture : </h5>
            <img src="avatar.png" class="img-responsive" alt="Responsive image">
            <br/>
            <?php
            echo "<div class=\"row\"><label>Firstname : </label><input type='text' placeholder='". $data['firstname'] ."'/></div><br/>";
            echo "<div class=\"row\"><label>Lastname : </label><input type='text' placeholder='". $data['name'] ."'/></div><br/>";
            echo "<div class=\"row\"><label>Your email : </label><input type='text' placeholder='". $data['email'] ."'/></div><br/>";

            echo "<div class=\"row\"><label>Your actual native language : ". $lang[2]['name'] ."</label><br/><select>";
                for($i = 0; $i < sizeof($allLang); $i++) {
                    echo "<option value='". $allLang[$i]['id'] ."'>". $allLang[$i]['name'] ."</option>";
                }
                echo "</select></div><br/>";

            echo "<div class=\"row\"><label>Your actual wished language 1 : ". $lang[0]['name'] ."</label><br/><select>";
                for($i = 0; $i < sizeof($allLang); $i++) {
                    echo "<option value='". $allLang[$i]['id'] ."'>". $allLang[$i]['name'] ."</option>";
                }
            echo "</select></div><br/>";

            echo "<div class=\"row\"><label>Associated actual level wish 1 : " . $lang[1]['niveau'] . "</label><br/><select>";
                for($i = 0; $i < sizeof($allLevel); $i++) {
                    echo "<option value='". $allLevel[$i]['id'] ."'>". $allLevel[$i]['niveau'] ."</option>";
                }
            echo "</select></div><br/>";
            

            echo "<div class=\"row\"><label>Your actual wished language 2 : ". $lang[0]['name'] ."</label><br/><select>";
                for($i = 0; $i < sizeof($allLang); $i++) {
                    echo "<option value='". $allLang[$i]['id'] ."'>". $allLang[$i]['name'] ."</option>";
                }
                echo "</select></div><br/>";
            echo "<div class=\"row\"><label>Associated actual level wish 2 : " . $lang[1]['niveau'] . "</label><br/><select>";
                for($i = 0; $i < sizeof($allLevel); $i++) {
                    echo "<option value='". $allLevel[$i]['id'] ."'>". $allLevel[$i]['niveau'] ."</option>";
                }
                echo "</select></div><br/>";

            echo "<div class=\"row\"><label>Your actual wished language 3 : ". $lang[0]['name'] ."</label><br/><select>";
                for($i = 0; $i < sizeof($allLang); $i++) {
                    echo "<option value='". $allLang[$i]['id'] ."'>". $allLang[$i]['name'] ."</option>";
                }
                echo "</select></div><br/>";
            echo "<div class=\"row\"><label>Associated actual level wish 3 : " . $lang[1]['niveau'] . "</label><br/><select>";
                for($i = 0; $i < sizeof($allLevel); $i++) {
                    echo "<option value='". $allLevel[$i]['id'] ."'>". $allLevel[$i]['niveau'] ."</option>";
                }
                echo "</select></div><br/>";
            ?>
            <form action="../controller/controllerProfilModif.php" method="post">
                <input type="submit" name="Validate" value="Validate"/>
                <input type="submit" name="BackToIndex" value="BackToIndex"/>
            </form>
        </div>
    </div>
</div>

<?php
end_page();
?>
