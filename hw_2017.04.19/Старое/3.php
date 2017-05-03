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
    $n = $_POST['count_letter'];
} else {
    $text = 'Lorem ipsum dolor sit amet, his enim numquam percipitur ad. Magna ridens quaestio sea ea, quaeque deserunt eos ut, ipsum scripta no nec. Dicunt denique omittantur ad sit, ne albucius sensibus vis. Ad dolore admodum dignissim nec. Pri diam eirmod disputando at.
Et nec sonet pertinacia. Mea ad facilis suscipit.';
    $n = 4;
};

//$text_new = getShortWords($text, $n);
$text_new = preg_replace_callback(
    "/[\w]+/",
    function ($word) {
        global $n;
        return strlen($word[0]) > $n ? '' : $word[0];
    },
    $text
);
$text_new = preg_replace( "/[ ]+/", ' ', $text_new);


?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <span>Введите текст:</span><br>
    <textarea name="text" rows="7" cols="100"><?php echo $text ?></textarea><br><br>
    <span>Задайте максимальное количество букв в слове:</span><br>
    <input type="text" name="count_letter" value="<?php echo $n ?>"><br><br>
    <input type="submit" value="Убрать длинные слова"><br>
    <span>Новый текст:</span><br>
    <textarea readonly name="text_new" rows="7" cols="100"><?php echo $text_new ?></textarea>
</form>

</body>
</html>

