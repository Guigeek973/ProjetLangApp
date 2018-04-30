<?php
    $title = 'Contact';
    start_page($title);
?>

<section>
    <div class="form">
        <form action="controllerContact" method="post">
            <h1>  Contact  </h1>

            <input type="text" name="lastname" placeholder="Nom*" required/><br/>

            <input type="text" name="firstname"  placeholder="Prénom*" required/><br/>

            <input type="text" name="mail"  placeholder="Adresse mail*" required/><br/>

            <textarea type="text" name="message"  placeholder="Message que vous voulez écrire*" required></textarea><br/>

            <input type="submit" name="valider" value="Envoyer"/>
        </form>
    </div>
</section>

<?php
    // what is that ?
    echo $_SESSION['messageEmail'];
    $_SESSION['messageEmail'] = '';
    end_page();
?>
