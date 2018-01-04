<?php
require('connect.php');
$path = 'img/';
$tmp_path = 'tmp/';
$types = array('image/gif', 'image/png', 'image/jpeg');

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $name = $_POST['name'];
    $email = $_POST['email'];
    $text = $_POST['text'];
    $image = '/img/'.$_FILES['picture']['name'];

    if((!empty($name)) && (!empty($email)) && (!empty($text))) {
        $query = "INSERT INTO `tasks` (name, email, text, image, status) 
        VALUES ('$name', '$email', '$text', '$image', 0)";
        $result = mysqli_query($connection, $query);
        if($result) {
            ?>
            <script>
                alert('Завдання додано!');
            </script>
            <?
        }
        else {
            ?>
            <script>
                alert('Помилка створення!');
            </script>
            <?
        }
    }
    else {
        ?>
        <script>
            alert('Заповніть усі поля!');
        </script>
        <?
    }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    if (!in_array($_FILES['picture']['type'], $types))
        die('<p>Заборонений тип файлу.<a href="?">Спробувати інший тип?</a></p>');

    function resize($file)
    {
        global $tmp_path;

        if ($file['type'] == 'image/jpeg')
            $source = imagecreatefromjpeg($file['tmp_name']);
        elseif ($file['type'] == 'image/png')
            $source = imagecreatefrompng($file['tmp_name']);
        elseif ($file['type'] == 'image/gif')
            $source = imagecreatefromgif($file['tmp_name']);
        else
            return false;

        $src = $source;

        $w_src = imagesx($src);
        $h_src = imagesy($src);

        $w = 320;
        $h = 240;

        if (($w_src > $w)||($h_src > $h))
        {
            $ratio1 = $w_src/$w;
            $w_dest = round($w_src/$ratio1);
            $ratio2 = $h_src/$h;
            $h_dest = round($h_src/$ratio2);

            $dest = imagecreatetruecolor($w_dest, $h_dest);

            imagecopyresampled($dest, $src, 0, 0, 0, 0, $w_dest, $h_dest, $w_src, $h_src);

            imagejpeg($dest, $tmp_path . $file['name']);
            imagedestroy($dest);
            imagedestroy($src);

            return $file['name'];
        }
        else
        {
            imagejpeg($src, $tmp_path . $file['name']);
            imagedestroy($src);

            return $file['name'];
        }
    }

    $imgname = resize($_FILES['picture'], $_POST['file_type'], $_POST['file_rotate']);

//    if (!@copy($tmp_path . $imgname, $path . $imgname))
//        echo '<p>Что-то пошло не так.</p>';
//    else
//        echo '<p>Зображення завантажено! <a href="' . $path . $_FILES['picture']['name'] . '">Переглянути</a>.</p>';

//    unlink($tmp_path . $imgname);
//    echo $imgname;
}
?>