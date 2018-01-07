<?php 
session_start();
 
require('connect.php');

require_once ('Zebra_Pagination.php');

// create exemplar of Zebra_Pagination class
$pagination = new Zebra_Pagination();

// specifying a standard sort type
if (!isset($_SESSION['cat'])) $_SESSION['cat'] = 'id_task';

if($_POST) {
    switch ($_POST['category']) {

        case 'name': { $_SESSION['cat'] = 'name'; break; }

        case 'email': { $_SESSION['cat'] = 'email'; break; }

        case 'status': { $_SESSION['cat'] = 'status'; break; }

        default : { $_SESSION['cat'] = 'id_task'; break; }
    }
}

$sql = '
    SELECT SQL_CALC_FOUND_ROWS id_task, name, email, text, image, status
    FROM tasks
    ORDER BY '.$_SESSION['cat'].'
    LIMIT ' . (($pagination->get_page() - 1) * $records_per_page) . ', ' . $records_per_page . ' ';

$result = mysqli_query($connection, ($sql)) or die(mysqli_error($connection));

$rows = mysqli_fetch_assoc(mysqli_query($connection, 'SELECT FOUND_ROWS() AS rows'));

$pagination->records($rows['rows']);

$pagination->records_per_page($records_per_page);

include('html/header.php');

?>
<main>
    <div class="container">
        <div class="row sort">
                <form method="POST">
                    <select name="category">
                        <option <?if ($_SESSION['cat']=='name'){?>selected<?}?>>name</option>
                        <option <?if ($_SESSION['cat']=='email'){?>selected<?}?>>email</option>
                        <?php if (isset($_SESSION['username'])) {?>
                        <option <?if ($_SESSION['cat']=='status'){?>selected<?}?>>status</option><?}?>
                    </select>
                    <button>Фільтр</button>
                </form>
        </div>
        <?php

        $index = 0;

        while ($row = mysqli_fetch_assoc($result)):

            echo $index++ % 2 ? '' : '';

            $id_task = $row['id_task'];

            $name = $row['name'];

            $email = $row['email'];

            $text = $row['text'];

            $status = $row['status'];

        ?>
        <div class="row task">
            <div class="col-lg-6">
                <?php
                if (isset($_SESSION['username']))
                    echo "<a href='\\edit.php?id_task=$id_task&name=$name&email=$email&text=$text&status=$status'>Редагувати</a>";?>

                <p><span>Ім'я: </span><?php echo $row['name'].'<br>'; ?></p>

                <p><span>Email: </span><?php echo $row['email'].'<br>'; ?></p>

                <p><span>Текст завдання: </span><?php echo $row['text'].'<br>'; ?></p>

                <p>
                    <?php

                    if (isset($_SESSION['username'])) {
                        ?><span>Статус: </span><?
                        if ($row['status']) echo "Прочитано"; else echo "Не прочитано";
                    }
                    ?>
                </p>
            </div>
            <div class="col-lg-6">
                <img src="<?echo $row['image'];?>">
            </div>
        </div>
        <?php
        endwhile;
        ?>
        <div class="row pagin">
            <?php
            $pagination->render();
            ?>
        </div>
    </div>
</main>
<?
include('html/footer.php');
?>


