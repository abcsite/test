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
    $arr_top = [];

    for ($i = 1; ($i <= $n) && (count($arr) > 0); $i++) {
        $max_word = 0;
        $max_leng = 0;

        foreach ($arr as $vol) {
            if (strlen($vol) > $max_leng) {
                $max_word = $vol;
                $max_leng = strlen($vol);
            }
        };

        $arr_top[] = $max_word;
        
        //  Удаляет из массива максимально длинное слово (оно может повторяться)
        // для того, чтобы дальше можно было искать следующий максимум
        foreach ($arr as $key => $vol) {
            if ($vol === $max_word) {
                unset($arr[$key]);
            }
        };
    }
    return $arr_top;
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

