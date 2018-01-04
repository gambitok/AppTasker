<?php
session_start();
require('connect.php');
?>
<?include('html/header.php');?>
<main>
    <div class="container">
        <div class="row red">
            <div class="col-lg-6">
                <form method="POST" action="change.php">
                    <h2>Редагування завдання</h2>
                    <ul>
                        <li>Name:</li>
                        <li><input type="text" name="name" value="<?echo $_REQUEST['name'];?>"></li>
                        <li>Email:</li>
                        <li><input type="text" name="email" value="<?echo $_REQUEST['email'];?>"></li>
                        <li>Text:</li>
                        <li><textarea type="text" name="text"><?echo $_REQUEST['text'];?></textarea></li>
                        <li>Status:<input type=checkbox name="status"
                                       <?if ($_REQUEST['status']){?>checked<?}?>></li>
                        <li><input type="submit" value="Save&Update"></li>
                        <li><input type="hidden" name="id_task" value="<?echo $_REQUEST['id_task']?>"></li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
</main>
<?include('html/footer.php');?>
