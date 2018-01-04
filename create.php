<?include('imagefunc.php');?>
<?include('html/header.php');?>
<main>
    <div class="container">
        <div class="row createtask">
            <div class="col-lg-6">
                <form method="post" enctype="multipart/form-data">
                    <h2>Створення нового завдання</h2>
                    <ul>
                        <li>Ваше імя:</li>
                        <li><input name="name" type="text"></li>
                        <li>Ваш email:</li>
                        <li><input name="email" type="email"></li>
                        <li>Текст завдання:</li>
                        <li><textarea name="text"></textarea></li>
                        <li><input type="button" value="Попередній перегляд" onclick="displayHTML(this.form)"></li>
                        <li><input type="file" name="picture"></li>
                        <li><input type="submit" value="Додати"></li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
</main>
<?include('html/footer.php');?>