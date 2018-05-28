<?php

$title="Profil";
start_page_min($title);

$data = getInfosProfil();
?>
<div class="container-fluid">
    <div class="text-center">
        <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="profil">Your profile</h4>
    </div>
    <div class="column">
        <div class="col-md-4 col-md-offset-4">
            <h5>Your profile picture : </h5>
            <img src="avatar.png" class="img-responsive" alt="Responsive image">
            <br/>
            <?php
            echo "<div class=\"row\"><label>Username : </label><input type='text' placeholder='". $data['username'] ."'/></div><br/>";
            echo "<div class=\"row\"><label>Firstname : </label><input type='text' placeholder='". $data['firstname'] ."'/></div><br/>";
            echo "<div class=\"row\"><label>Lastname : </label><input type='text' placeholder='". $data['lastname'] ."'/></div><br/>";
            echo "<div class=\"row\"><label>Your email : </label><input type='text' placeholder='". $data['mail'] ."'/></div><br/>";
            echo "<div class=\"row\"><label>Your native language : </label><input type='text' placeholder='". $data['natal'] ."'/></div><br/>";
            echo "<div class=\"row\"><label>Your wished language 1 : </label><input type='text' placeholder='". $data['souhait1'] ."'/></div><br/>";
            echo "<div class=\"row\"><label>Associated level wish 1 : </label><input type='text' placeholder='". $data['niv_souhait1'] ."'/></div><br/>";
            echo "<div class=\"row\"><label>Your wished language 2 : </label><input type='text' placeholder='". $data['souhait2'] ."'/></div><br/>";
            echo "<div class=\"row\"><label>Associated level wish 2 : </label><input type='text' placeholder='". $data['niv_souhait2'] ."'/></div><br/>";
            echo "<div class=\"row\"><label>Your wished language 3 : </label><input type='text' placeholder='". $data['souhait3'] ."'/></div><br/>";
            echo "<div class=\"row\"><label>Associated level wish 3 : </label><input type='text' placeholder='". $data['niv_souhait3'] ."'/></div><br/>";
            ?>
            <form action="controllerProfilModif" method="post">
                <input type="submit" name="Validate" value="Validate"/>
                <input type="submit" name="Back to main page" value="Back to main page"
            </form>
        </div>
    </div>
</div>

<?php
end_page();
?>
