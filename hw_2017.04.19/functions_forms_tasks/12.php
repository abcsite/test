<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>functions_forms_tasks</title>
</head>
<body>

<?php

if ($_POST) {
    $text = $_POST['text'];
} else {
    $text = 'А Васька слушает да ест. А воз и ныне там. А вы друзья как ни садитесь, все в музыканты не годитесь. А король-то — голый. А ларчик просто открывался. А там хоть трава не расти.';
};

$text_new = sentencesReverse($text);

function sentencesReverse($text) {
    $arr = explode('. ', trim($text, '.'));
    $arr_new = array_reverse($arr);
    $text_new = implode('. ', $arr_new);

    return $text_new . '.';
}

?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <span>Введите текст:</span><br>
    <textarea name="text" rows="7" cols="100"><?php echo $text ?></textarea><br><br>
    <input type="submit" value="Поменять порядок предложений"><br>
    <span>Новый текст:</span><br>
    <textarea name="text_new" rows="7" cols="100"><?php echo $text_new ?></textarea>

</form>

</body>
</html>

