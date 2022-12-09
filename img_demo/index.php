<?php
// //Выбираем случайное изображение любого формата.
// //Функция glob() ищет все пути, совпадающие с шаблоном
// $fnames = glob("img/*.{gif,jpg,png}", GLOB_BRACE);//GLOB_BRACE раскрывает {a,b,c} для совпадения с 'a', 'b' или 'c'. 
// $fname = $fnames[mt_rand (0, count($fnames)-1)];
// //Определяем формат изображения
// $size = getimagesize($fname);
// //Выводим изображение
// header("Content-type: {$size['mime']}");
// echo file_get_contents($fname);

// // Создание изображения 100*30
// $im = imagecreate(100, 30);
// // Желтый фон, синий текст
// $bg = imagecolorallocate($im, 255, 255, 0);
// $textcolor = imagecolorallocate($im, 0, 0, 255);
// // Надпись в левом верхнем углу
// imagestring($im, 5, 0, 0, 'Hello world!', $textcolor);
// // Вывод изображения в стандартный выходной поток - в браузер
// header('Content-type: image/png');
// imagepng($im);
// //освобождение памяти, занятой картинкой
// imagedestroy($im);

// // Строка:
// $string = "Hello!";
// // Загрузка рисунка фона
// $im = imageCreateFromPNG("banana.png");
// // Создание в палитре нового цвета — черного.
// $color = imageColorAllocate($im, 250, 250, 0);
// // Размер шрифта
// $size = 5;
// // Сдвиг надписи
// $offset = strlen($string) / 2 * $size;
// // Вычисление x для расположения текста по ширине
// $x = (imageSX($im) - strlen($string)) / 2 - $offset;
// $y = 5;
// // Вывод строки поверх загруженного изображения.
// imageString($im, $size, $x, $y, $string, $color);
// // Вывод картинки в стандартный выходной поток - в браузер
// header("Content-type: image/png");
// imagePng($im); // освобождение памяти, занятой картинкой 
// imageDestroy($im);

// // Тип содержимого
// header('Content-Type: image/png');
// Создание изображения
// $im = imagecreatetruecolor(400, 30);
// // Создание цветов
// $white = imagecolorallocate($im, 255, 255, 255);
// $grey = imagecolorallocate($im, 128, 128, 128);
// $black = imagecolorallocate($im, 0, 0, 0);
// imagefilledrectangle($im, 0, 0, 399, 29, $white);
// // Текст надписи
// $text = 'Test...';
// // Замена пути к шрифту на пользовательский
// $font = dirname(__FILE__) . '/fonts/BAUHS93.TTF';
// // Тень
// imagettftext($im, 20, 0, 11, 21, $grey, $font, $text);
// // Текст
// imagettftext($im, 20, 0, 10, 20, $black, $font, $text);
// imagepng($im);
// imagedestroy($im);

// $i = imageCreate(100, 100);
// $c = imageColorAllocate($i, 1, 255, 1);

// imageFilledRectangle($i, 0, 0, imageSX($i)-1, imageSY($i)-1, $c) ;
// imageColorTransparent($i, $c);

// // дальше работаем с изначально прозрачным фоном
// imagepng($i);
// imagedestroy($i);

// header('Content-Type: image/jpg');
// // Создание изображения 200 x 200
// $canvas = imagecreatetruecolor(200, 200);

// // Создание цветов
// $pink = imagecolorallocate($canvas, 255, 105, 180);
// $white = imagecolorallocate($canvas, 255, 255, 255);
// $green = imagecolorallocate($canvas, 132, 135, 28);

// // Рисование разноцветных прямоугольников
// imagerectangle($canvas, 50, 50, 150, 150, $pink);
// imagerectangle($canvas, 45, 60, 120, 100, $white);
// imagerectangle($canvas, 100, 120, 75, 160, $green);

// // Вывод и освобождение памяти
// header('Content-Type: image/jpeg');
// imagejpeg($canvas, "r.jpeg");
// imagedestroy($canvas);

// создание изображения
// $image = imagecreatetruecolor(100, 100);
// // определение цветов
// $white = imagecolorallocate($image, 0xFF, 0xFF, 0xFF);
// $gray = imagecolorallocate($image, 0xC0, 0xC0, 0xC0);
// $darkgray = imagecolorallocate($image, 0x90, 0x90, 0x90);
// $navy = imagecolorallocate($image, 0x00, 0x00, 0x80);
// $darknavy = imagecolorallocate($image, 0x00, 0x00, 0x50);
// $red = imagecolorallocate($image, 0xFF, 0x00, 0x00);
// $darkred = imagecolorallocate($image, 0x90, 0x00, 0x00);
// // делаем эффект 3Д
// for ($i = 60; $i > 50; $i--) {
// 	imagefilledarc($image, 50, $i, 100, 50, 0, 45, $darknavy, IMG_ARC_PIE);
// 	imagefilledarc($image, 50, $i, 100, 50, 45, 75 , $darkgray, IMG_ARC_PIE);
// 	imagefilledarc($image, 50, $i, 100, 50, 75, 360 , $darkred, IMG_ARC_PIE);
// }
// imagefilledarc($image, 50, 50, 100, 50, 0, 45, $navy, IMG_ARC_PIE);
// imagefilledarc($image, 50, 50, 100, 50, 45, 75 , $gray, IMG_ARC_PIE);
// imagefilledarc($image, 50, 50, 100, 50, 75, 360 , $red, IMG_ARC_PIE);
// // вывод изображения
// header('Content-type: image/png');
// imagepng($image);
// imagedestroy($image);

//  // Диаграмма будет представлена для значений следующего массива:
//  $values = array("23","32","35","57","12",
//  "3","36","54","32","15",
//  "43","24","30");
//  // Количество столбцов диаграммы:
//  $columns = count($values);
//  // Задаем щирину и высоту всего изображения
//  $width = 300;
//  $height = 200;
//  // Задаем пространство между колонками:
//  $padding = 2;
//  // Получаем ширину одной колонки:
//  $column_width = $width / $columns ;
//  // Создаем переменные
//  $im = imagecreate($width,$height);
//  $gray = imagecolorallocate ($im,0xcc,0xcc,0xcc);
//  $gray_lite = imagecolorallocate ($im,0xee,0xee,0xee);
//  $gray_dark = imagecolorallocate ($im,0x7f,0x7f,0x7f);
//  $white = imagecolorallocate ($im,0xff,0xff,0xff);
//  // Заполняем фон картинки
//  imagefilledrectangle($im,0,0,$width,$height,$white);
//  $maxv = 0;
//  // Вычисляем максимум
//  for($i=0;$i<$columns;$i++)
//    $maxv = max($values[$i],$maxv);
//  // Рисуем каждую колонку
//  for($i=0;$i<$columns;$i++)
//  {
//    $column_height = ($height / 100) * (( $values[$i] / $maxv) *100);
//    $x1 = $i*$column_width;
//    $y1 = $height-$column_height;
//    $x2 = (($i+1)*$column_width)-$padding;
//    $y2 = $height;
//    @imagefilledrectangle($im,$x1,$y1,$x2,$y2,$gray);
//    //для 3D эффекта
//    @imageline($im,$x1,$y1,$x1,$y2,$gray_lite);
//    @imageline($im,$x1,$y2,$x2,$y2,$gray_lite);
//    @imageline($im,$x2,$y1,$x2,$y2,$gray_dark);
//  }
// // Посылаем информацию заголовку, можно заменить на JPEG или GIF 
// header ("Content-type: image/png");
// imagepng($im);