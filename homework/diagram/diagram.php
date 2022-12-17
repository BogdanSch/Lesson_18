<?php

header("Content-type: image/png");

$students = [
    [
        "name" => "Joan",
        "surname" => "Joanson",
        "year" => 2005,
        "marks" => [
            "PHP" => 4,
            "JS" => 3,
            "HTML" => 5
        ]
    ],
    [
        "name" => "Jack",
        "surname" => "Smith",
        "year" => 2003,
        "marks" => [
            "PHP" => 3,
            "JS" => 3,
            "HTML" => 4
        ]
    ],
    [
        "name" => "Martin",
        "surname" => "Miller",
        "year" => 2004,
        "marks" => [
            "PHP" => 4,
            "JS" => 4,
            "HTML" => 5
        ]
    ]
];

if (isset($_GET['submit'])) {
    $diagram_type = $_GET['diagramType'];

    if ($diagram_type == "pie") {
        // создание изображения
        $image = imagecreatetruecolor(100, 100);
        // определение цветов
        $white = imagecolorallocate($image, 0xFF, 0xFF, 0xFF);
        $gray = imagecolorallocate($image, 0xC0, 0xC0, 0xC0);
        $darkgray = imagecolorallocate($image, 0x90, 0x90, 0x90);
        $navy = imagecolorallocate($image, 0x00, 0x00, 0x80);
        $darknavy = imagecolorallocate($image, 0x00, 0x00, 0x50);
        $red = imagecolorallocate($image, 0xFF, 0x00, 0x00);
        $darkred = imagecolorallocate($image, 0x90, 0x00, 0x00);
        // делаем эффект 3Д
        for ($i = 60; $i > 50; $i--) {
            imagefilledarc($image, 50, $i, 100, 50, 0, 45, $darknavy, IMG_ARC_PIE);
            imagefilledarc($image, 50, $i, 100, 50, 45, 75, $darkgray, IMG_ARC_PIE);
            imagefilledarc($image, 50, $i, 100, 50, 75, 360, $darkred, IMG_ARC_PIE);
        }
        imagefilledarc($image, 50, 50, 100, 50, 0, 45, $navy, IMG_ARC_PIE);
        imagefilledarc($image, 50, 50, 100, 50, 45, 75, $gray, IMG_ARC_PIE);
        imagefilledarc($image, 50, 50, 100, 50, 75, 360, $red, IMG_ARC_PIE);
        // вывод изображения
        imagepng($image);
        imagedestroy($image);
    } else {
        $values = array(
            "23", "32", "35", "57", "12",
            "3", "36", "54", "32", "15",
            "43", "24", "30"
        );
        // Количество столбцов диаграммы:
        $columns = count($values);
        // Задаем щирину и высоту всего изображения
        $width = 300;
        $height = 200;
        // Задаем пространство между колонками:
        $padding = 2;
        // Получаем ширину одной колонки:
        $column_width = $width / $columns;
        // Создаем переменные
        $im = imagecreate($width, $height);
        $gray = imagecolorallocate($im, 0xcc, 0xcc, 0xcc);
        $gray_lite = imagecolorallocate($im, 0xee, 0xee, 0xee);
        $gray_dark = imagecolorallocate($im, 0x7f, 0x7f, 0x7f);
        $white = imagecolorallocate($im, 0xff, 0xff, 0xff);
        // Заполняем фон картинки
        imagefilledrectangle($im, 0, 0, $width, $height, $white);
        $maxv = 0;
        // Вычисляем максимум
        for ($i = 0; $i < $columns; $i++)
            $maxv = max($values[$i], $maxv);
        // Рисуем каждую колонку
        for ($i = 0; $i < $columns; $i++) {
            $column_height = ($height / 100) * (($values[$i] / $maxv) * 100);
            $x1 = $i * $column_width;
            $y1 = $height - $column_height;
            $x2 = (($i + 1) * $column_width) - $padding;
            $y2 = $height;
            imagefilledrectangle($im, $x1, $y1, $x2, $y2, $gray);
            //для 3D эффекта
            imageline($im, $x1, $y1, $x1, $y2, $gray_lite);
            imageline($im, $x1, $y2, $x2, $y2, $gray_lite);
            imageline($im, $x2, $y1, $x2, $y2, $gray_dark);
        }
        imagepng($im);
    }
}
