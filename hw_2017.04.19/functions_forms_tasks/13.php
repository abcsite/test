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
    $text = 'яблоко черешня вишня вишня черешня груша яблоко черешня вишня яблоко вишня вишня черешня груша яблоко черешня черешня вишня яблоко вишня вишня черешня вишня черешня груша яблоко черешня черешня вишня яблоко вишня вишня черешня черешня груша яблоко черешня вишня';
};

$arr_words = countWords($text);

function countWords($text) {
    $arr = explode(' ', trim($text));
    $arr_words = [];

    $arr_words = array_count_values($arr);
    arsort($arr_words, SORT_NUMERIC);

    return $arr_words;
}

?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <span>Введите текст:</span><br>
    <textarea name="text" rows="7" cols="100"><?php echo $text ?></textarea><br><br>
    <input type="submit" value="Определить число повторений слов"><br>
    <span>Слова и число их повторений:</span><br>

    <?php
    foreach ($arr_words as $key => $vol) {
        echo $key . ' - ' . $vol . '<br>';
    };
    ?>

</form>

</body>
</html>

