<link href="//fonts.googleapis.com/css?family=Source+Sans Pro:200italic,…,300,400italic,400,600italic,600,700italic,700,900italic,900" rel="stylesheet" type="text/css">

<?
function Translate($chaine, $langFrom, $langTo)
{
$chaine = urlencode($chaine);
$url = 'http://translate.google.com/translate_a/t?client=p&text='.$chaine.'&hl='.$langFrom.'&sl='.$langFrom.'&tl='.$langTo.'&ie=UTF-8&oe=UTF-8&multires=1&otf=1&pc=1&trs=1&ssel=3&tsel=6&sc=1';
$retour = explode('"',curl($url));
return $retour[5];
}
?>
// ---------------------
>
<?php
$chaine = (!empty($_POST['traduire']))? trim($_POST['traduire']) : '';
$langFrom = (!empty($_POST['langFrom']))? $_POST['langFrom'] : 'fr';
$langTo = (!empty($_POST['langTo']))? $_POST['langTo'] : 'en';
// ---------------------
$lang_array = array(
'fr' =>'Français',
'en' =>'English',
'ar' =>'Arabe',
'es' =>'Español',
'de' =>'Deutsch'
);
// ---------------------
?>
<form name="" method="post">
    <p>
        <label>Traduction : </label>
        <select name="langFrom">
            <?php
            foreach($lang_array as $lang_value => $lang_name){
                $selected = ($langFrom == $lang_value)? ' selected="selected"' : '';
                echo '		<option value="'.$lang_value.'" '.$selected.'>'.$lang_name.'</option>'."\n";
            }
            ?>
        </select>
        =>
        <select name="langTo">
            <?php
            foreach($lang_array as $lang_value => $lang_name){
                $selected = ($langTo == $lang_value)? ' selected="selected"' : '';
                echo '		<option value="'.$lang_value.'" '.$selected.'>'.$lang_name.'</option>'."\n";
            }
            ?>
        </select>
    </p>
    <p>
        <textarea name="traduire" cols="60" rows="8"><?php echo $chaine ; ?></textarea>
    </p>
    <p>
        <input class="btn btn-primary" name="ok" type="submit" value="Traduire" />
    </p>
</form>

<?
echo  Translate($chaine, $langFrom, $langTo);
?>

