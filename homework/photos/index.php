<?php # Фотоальбом с возможностью закачки.
header('Content-Type: text/html; charset=utf-8');

$imgDir = "img"; // каталог для хранения изображений
if (isset($_REQUEST['delete'])) {
    $photo_to_delete = $_REQUEST['url'];
    $status = unlink($photo_to_delete) or exit("Невозможно удалить файл");
}
if (isset($_REQUEST['doUpload'])) { // Проверяем, нажата ли кнопка добавления фотографии, 
    if (!file_exists($imgDir))
        mkdir($imgDir, 0777); // создаем каталог, если его еще нет

    $data = $_FILES['file'];
    $tmp = $data['tmp_name'];

    if (file_exists($tmp)) { // Проверяем, принят ли файл,
        $info = getimagesize($_FILES['file']['tmp_name']); //Функция вернет размер изображения, тип файла, height, width, а также тип содержимого HTTP
        // Проверяем, является ли файл изображением,
        if (preg_match('{image/(.*)}is', $info['mime'], $p)) {
            // Имя берем равным текущему времени в секундах, а
            // расширение — как часть MIME-типа после "image/".
            $name = "$imgDir/" . time() . "." . $p[1];
            // Добавляем файл в каталог с фотографиями.
            move_uploaded_file($tmp, $name);
        } else {
            echo "<h2>Попытка добавить файл недопустимого формата!</h2>";
        }
    } else {
        echo "<h2>Ошибка закачки #{$data['error']}!</h2>";
    }
}
// Считываем в массив фотоальбом.
$photos = array();
foreach (glob("$imgDir/*") as $path) {
    $sz = getimagesize($path); // размер
    $tm = filemtime($path); // время добавления
    // Вставляем изображение в массив $photos.
    $photos[$tm] = array(
        'time' => $tm, // время добавления
        'name' => basename($path), // имя файла
        'url' => $path, // его URI
        'w' => $sz[0], // ширина картинки
        'h' => $sz[1], // ее высота
        'wh' => $sz[3]
    ); // "width=xxx height=yyy"
}
// Ключи массива $photos — время в секундах, когда была добавлена
// та или иная фотография. Сортируем массив: наиболее новые
// фотографии располагаем ближе к его началу.
krsort($photos);
// Страница:
?>

<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<body>
    <div class="container">
        <h1>Photo library</h1>
        <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="POST" enctype="multipart/form-data" class="add-photo-form">
        <hr>
            <div class="form_wrap">
                <input type="file" name="file" class="form-control"><br>
                <input type="submit" name="doUpload" value="закачать новую фотографию" class="btn btn-primary">
            </div>
            <hr>
        </form>
        <div class="photos__list">
            <?php foreach ($photos as $n => $img) { ?>
                <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="POST" enctype="multipart/form-data" class="photo__item">
                    <img src="<?php echo $img['url'] ?>" id=<?php echo $img['time'] ?> alt="Дoбaвлeнa <?php echo date("d.m.Y H:i:s", $img['time']) ?>" />
                    <p>Дoбaвлeнa <?php echo date("d.m.Y H:i:s", $img['time']) ?></p>
                    <input type="hidden" value="<?php echo $img['url']; ?>" name="url">
                    <input type="submit" name="delete" value="Удалить" class="btn btn-danger">
                </form>
            <?php } ?>
        </div>
    </div>
</body>