<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>functions_forms_tasks</title>
</head>
<body>

<?php

if ($_POST) {
    $text_1 = $_POST['text_1'];
    $text_2 = $_POST['text_2'];
} else {
    $text_1 = 'Lorem ipsum dolor sit amet, his enim numquam percipitur ad. Magna ridens quaestio sea ea, quaeque deserunt eos ut, ipsum scripta no nec. Dicunt denique omittantur ad sit, ne albucius sensibus vis. Ad dolore admodum dignissim nec. Pri diam eirmod disputando at.
Et nec sonet pertinacia. Mea ad facilis suscipit.';
    $text_2 = 'Lorem ipsum dolor sit amet, wisi explicari ius ea, mel ea aeterno singulis constituam, no recusabo expetendis reprehendunt eum. Sint labores sea ne. Sea ipsum perpetua no, quod unum labores ius ea. Eam cu oratio eruditi legimus, no liber verear sed. Ne brute harum bonorum mea.
Posse nonumy nam ad.';
};

$arr_common = getCommonWords($text_1, $text_2);
$text_common = implode(' ', $arr_common );

function getCommonWords($a, $b) {
    $a = strtolower($a);  // Необходимо для регистронезависимого сравнения слов
    $b = strtolower($b);
    $arr_a = preg_split("/[^\w]+/", $a);
    $arr_b = preg_split("/[^\w]+/", $b);
    $arr_int = array_intersect($arr_a, $arr_b);
    $arr_common = array_unique($arr_int, SORT_STRING);

    return $arr_common;
}

?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <span>Введите первый текст:</span><br>
    <textarea name="text_1" rows="7" cols="100"><?php echo $text_1 ?></textarea><br><br>
    <span>Введите второй текст:</span><br>
    <textarea name="text_2" rows="7" cols="100"><?php echo $text_2 ?></textarea><br><br>
    <input type="submit" value="Определить общие слова"><br>
    <span>Общие слова:</span><br>
    <textarea readonly name="text_common" rows="7" cols="100"><?php echo $text_common ?></textarea>
</form>

</body>
</html>

