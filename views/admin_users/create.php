<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/user">Управление users</a></li>
                    <li class="active">Редактировать user</li>
                </ol>
            </div>


            <h4>Добавить новый user</h4>

            <br/>

            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Имя</p>
                        <input type="text" name="name" placeholder="" value="">

                        <br/>

                        <p>Email</p>
                        <input type="email" name="email" placeholder="" value="">

                        <br/>

                        <p>Пароль</p>
                        <input type="password" name="password" placeholder="" value="">

                        <br/>

                        <p>Роль</p>
                        <select name="role">
                            <option value="admin">Администратор</option>
                            <option value="user" selected="selected">Пользователь</option>
                        </select>

                        <br/><br/>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

                        <br/><br/>

                    </form>

                </div>
            </div>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

