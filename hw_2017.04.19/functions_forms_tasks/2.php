<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>functions_forms_tasks</title>
</head>
<body>

<?php

$nTop = 3;

if ($_POST) {
    $text = $_POST['text'];
} else {
    $text = 'Lorem ipsum dolor sit amet, his enim numquam percipitur ad. Lorem ipsum dolor sit amet, his enim numquam percipitur ad.';
};

$arr_top = topLengWords($text, $nTop);

function topLengWords($text, $n) {
    $text = strtolower($text);  // Необходимо для регистронезависимого сравнения слов
    $arr = preg_split("/[^\w]+/", $text, -1, PREG_SPLIT_NO_EMPTY) ;
    $arr_leng = [];

    foreach ($arr as $key => $vol) {
        $arr_leng[$vol] = strlen($vol);
    };

    arsort($arr_leng, SORT_NUMERIC);
    $arr_top = array_slice($arr_leng, 0, $n);

    return array_keys($arr_top);
}

?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <span>Введите текст:</span><br>
    <textarea name="text" rows="7" cols="100"><?php echo $text ?></textarea><br><br>
    <input type="submit" value="Определить ТОП самых длинных слов"><br>
    <span>Самые длинные слова:</span><br>

    <?php
    foreach ($arr_top as $key => $vol) {
        echo ($key + 1) . '. ' . $vol . '<br>';
    };
    ?>

</form>

</body>
</html>

