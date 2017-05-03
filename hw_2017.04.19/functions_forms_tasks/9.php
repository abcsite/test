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
    $text = 'abcde';
};

$text_new = textReverse($text);

function textReverse($text) {
    $text = trim($text);
    $leng = strlen($text);

    for ($i = 0; $i < $leng; $i++) {
        $arr[$i] = $text[$leng - $i - 1];
    };
    return implode('', $arr);
}

?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <span>Введите текст:</span><br>
    <textarea name="text" rows="3" cols="70"><?php echo $text ?></textarea><br><br>
    <input type="submit" value="Поменять направление текста"><br>
    <span>Новый текст:</span><br>
    <textarea name="text_new" rows="3" cols="70"><?php echo $text_new ?></textarea>
</form>

</body>
</html>

