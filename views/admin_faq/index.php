<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление FAQ's</li>
                </ol>
            </div>

            <a href="/admin/faq/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить FAQ</a>
            
            <h4>Список FAQ</h4>

            <p>Фильтр по теме:
                <a href="/admin/faq">Все темы</a>
                <?php foreach ($categoriesList as $category): ?>
                    | <a href="/admin/faq/teme/<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a>
                <?php endforeach; ?>
            </p>
            <p>Фильтр по ответам: <a href="/admin/faq">все</a> | <a href="/admin/faq/needanswer">без ответа</a></p>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID</th>
                    <th>Вопрос</th>
                    <th>Ответы</th>
                    <th>Статус</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($faqsList as $faq): ?>
                    <tr>
                        <td><?php echo $faq['id']; ?></td>
                        <td><?php echo $faq['question']; ?></td>
                        <td><?php echo $faq['answer']; ?></td>
                        <td><?php if ($faq['status'] == 0) {echo 'Скрыт';} else {echo 'Отображается';} ?></td>
                        <td><a href="/admin/faq/update/<?php echo $faq['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/faq/delete/<?php echo $faq['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

