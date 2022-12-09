<?php

function get_all_images($folder_name)
{
    $array = array_diff(scandir($folder_name), array('.', '..'));
    return $array;
}

header('Content-Type: image/png');

$processed_img_folder = "res-img"; 
$images = get_all_images("img");

mkdir($processed_img_folder);
$counter = 0;

foreach ($images as $key => $value) {
    // Создание изображения
    $im = imageCreateFromPNG(dirname(__FILE__)."/img/".$value);
    // Создание цветов
    $white = imagecolorallocate($im, 255, 255, 255);
    $grey = imagecolorallocate($im, 128, 128, 128);
    $black = imagecolorallocate($im, 0, 0, 0);
    // Текст надписи
    $text = 'BS';
    // Замена пути к шрифту на пользовательский
    $font = dirname(__FILE__) . '/fonts/BAUHS93.TTF';
    // Тень
    imagettftext($im, 20, 0, 11, 101, $grey, $font, $text);
    // Текст
    imagettftext($im, 20, 0, 10, 100, $black, $font, $text);
    imagepng($im, "$processed_img_folder/file_img_$counter.png");
    imagedestroy($im);
    $counter++;
}
