<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>functions_forms_tasks</title>
</head>
<body>

<?php
//echo setlocale(LC_ALL, 'Russian_Russia.65001'), PHP_EOL;
//echo ucwords(strtolower('привет МИР!')), PHP_EOL;
//echo preg_match('/^\w+$/', 'привет') ? 'нашёл' : 'не работает', PHP_EOL;
//echo strftime('Сегодня: %A, %d %B, %Y года');

if ($_POST) {
    $text = $_POST['text'];
} else {
    $text = 'а васька слушает да ест. а воз и ныне там. а вы друзья как ни садитесь, все в музыканты не годитесь. а король-то — голый. а ларчик просто открывался.а там хоть трава не расти.';
};

$text_new = firstLetterUp($text);

function firstLetterUp($text) {
    $arr = explode('. ', trim($text));
    $arr_new = [];

    foreach($arr as $k => $v){
        // Почему-то не работает функция ucfirst с кириллицей
        $arr_new[$k] = ucfirst($v);
    };
    $text_new = implode('. ', $arr_new);

    return $text_new;
}

?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <span>Введите текст:</span><br>
    <textarea name="text" rows="7" cols="100"><?php echo $text ?></textarea><br><br>
    <input type="submit" value="Сделать заглавной первую букву всех предложений"><br>
    <span>Новый текст:</span><br>
    <textarea name="text_new" rows="7" cols="100"><?php echo $text_new ?></textarea>

</form>

</body>
</html>

