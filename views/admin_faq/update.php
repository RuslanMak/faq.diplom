<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/faq">Управление FAQ's</a></li>
                    <li class="active">Редактировать товар</li>
                </ol>
            </div>


            <h4>Редактировать вопрос-ответ #<?php echo $id; ?></h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Категория</p>
                        <select name="category_id">
                            <?php if (is_array($categoriesList)): ?>
                                <?php foreach ($categoriesList as $category): ?>
                                    <option value="<?php echo $category['id']; ?>"
                                        <?php if ($faq['category_id'] == $category['id']) echo ' selected="selected"'; ?>>
                                        <?php echo $category['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                        <br/><br/>

                        <p>Вопрос</p>
                        <input type="text" name="question" placeholder="" value="<?php echo $faq['question']; ?>">

                        <br/>

                        <p>Ответ</p>
                        <textarea name="answer"><?php echo $faq['answer']; ?></textarea>
                        
                        <br/><br/>

                        <p>Автор</p>
                        <select name="availability">
                            <option value="<?php echo $faq['user_id']; ?>" selected="selected"><?php echo $faq['user_id']; ?></option>
                            <option value="3">Нет</option>
                        </select>
                        
                        <br/><br/>
                        
                        <p>Новинка</p>
                        <select name="is_new">
                            <option value="1" <?php if ($faq['is_new'] == 1) echo ' selected="selected"'; ?>>Да</option>
                            <option value="0" <?php if ($faq['is_new'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                        </select>
                        
                        <br/><br/>

                        <p>Статус</p>
                        <select name="status">
                            <option value="1" <?php if ($faq['status'] == 1) echo ' selected="selected"'; ?>>Отображается</option>
                            <option value="0" <?php if ($faq['status'] == 0) echo ' selected="selected"'; ?>>Скрыт</option>
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

