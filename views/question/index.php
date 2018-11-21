<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <h3>Страница для вопроса</h3>
            
            <h4>Привет, <?php echo $user['name'];?>!<br>
                Заполни форму для отправки вопроса</h4>

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

                        <p>Категория</p>
                        <select name="category_id">
                            <?php if (is_array($categoriesList)): ?>
                                <?php foreach ($categoriesList as $category): ?>
                                    <option value="<?php echo $category['id']; ?>">
                                        <?php echo $category['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                        <br/><br/>

                        <p>Ваш вопрос</p>
                        <textarea name="question"></textarea>

                        <input type="hidden" name="user_id" placeholder="" value="<?php echo $user['id']; ?>">

                        <br/><br/>

                        <input type="submit" name="submit" class="btn btn-default" value="Отправить">

                        <br/><br/>

                    </form>
                </div>
            </div>
            
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>