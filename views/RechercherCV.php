<?php
/**
 * Created by PhpStorm.
 * User: zekil_000
 * Date: 19/01/2017
 * Time: 15:22
 */

$title = 'Recherche de CV';
start_page($title);
?>
<section>
    <div class="form">
        <form action="controllerRechercheCV" method="post">
            <label> Tri par compétence
                <input type="checkbox" name="competence" value="competence"/>
            </label>
            <label> Tri par formation
                <input type="checkbox" name="formation" value="formation"/>
            </label>
            <?php
                echo '<select name="competence">';
                /** @var string $competence */
            for($i=0; $i<count(getListCompetences()); ++$i) {
                    echo '<option value="'.getListCompetences()[$i][0].'">' .getListCompetences()[$i][0]. '</option>';
                }
                echo '</select>';
                echo '<select name="formation">';
                /** @var string $formation */
            foreach(getListFormations() as $formation) {
                    echo '<option value="'.$formation[0].'">' . $formation[0] . '</option>';
                }
                echo '</select>';
            ?>
            <input type="submit" name="valider" value="Rechercher"/>

        </form>
    </div>
</section>
<?php
end_page();
?>
