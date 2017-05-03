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
    $text = 'Lorem ipsum dolor sit amet his enim numquam percipitur ad Lorem ipsum dolor sit amet his enim numquam percipitur ad Magna ridens quaestio sea ea quaeque deserunt eos ut ipsum scripta no nec';
};

$arr_uniq_words = countUniqWords($text);

function countUniqWords($text) {
    $text = strtolower($text);  // Необходимо для регистронезависимого сравнения слов
    $arr = explode(' ', trim($text));
    $arr_uniq = [];

    foreach($arr as $k => $v){
        isset($arr_uniq[$v]) ? $arr_uniq[$v]++ : $arr_uniq[$v] = 1 ;
    };
//  Цикл foreach можно заменить выражением:
//  $arr_uniq = array_count_values($arr);
    ksort($arr_uniq);

    return $arr_uniq;
}

?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <span>Введите текст:</span><br>
    <textarea name="text" rows="7" cols="100"><?php echo $text ?></textarea><br><br>
    <input type="submit" value="Определить количество повторений каждого слова"><br>
    <span>Слова и количество их повторений:</span><br>

    <?php
    foreach ($arr_uniq_words as $key => $vol) {
        echo $key . ' - ' . $vol . '<br>';
    };
    ?>

</form>

</body>
</html>

