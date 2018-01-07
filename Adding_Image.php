<?php
/**
 *  Adding image script that uploading images to the server and changing
 *  the size of the image.
 */
require('connect.php');

//image storage folder
$path = 'img/';

// temporary image storage folder
$tmp_path = 'tmp/';

$types = array('image/gif', 'image/png', 'image/jpeg');

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

    // variables that transmit the value of the input fields
    // the name of the user who created task
    $name = $_POST['name'];

    // user mail that created task
    $email = $_POST['email'];

    // text of task
    $text = $_POST['text'];

    // image path for task
    $image = '/img/'.$_FILES['picture']['name'];

    // check form filling fields
    if((!empty($name)) && (!empty($email)) && (!empty($text)) && (!empty($_FILES['picture']['name']))) {

        //check image format
        if (!in_array($_FILES['picture']['type'], $types)) {

            ?>
            <script>
                alert('Не вірний формат зображення!');
            </script>
            <?

        } else {

            //adding a new task to the database `tasks`
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
    }
    else {
        ?>
        <script>
            alert('Заповніть усі поля!');
        </script>
        <?
    }

    /**
     *  Image resize function.
     *  Change size of image.
     */
    function resize($file)
    {
        global $tmp_path;

        // definition of image format
        if ($file['type'] == 'image/jpeg')
            $source = imagecreatefromjpeg($file['tmp_name']);

        elseif ($file['type'] == 'image/png')
            $source = imagecreatefrompng($file['tmp_name']);

        elseif ($file['type'] == 'image/gif')
            $source = imagecreatefromgif($file['tmp_name']);

        else
            return false;

        $src = $source;

        // image source width
        $w_src = imagesx($src);

        // image source height
        $h_src = imagesy($src);

        // image max width
        $w = 320;

        // image max height
        $h = 240;

        // if the width or height is greater than the specified
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

    // downloading file
    copy($tmp_path . $imgname, $path . $imgname);

    // deleting temporary file
    if (!empty($_FILES['picture']['name'])) unlink($tmp_path . $imgname);
}
?>