<?php

/**
 * Контроллер AdminFaqController
 * Управление FAQ's в админпанели
 */
class AdminFaqController extends AdminBase
{

    /**
     * Action для страницы "Управление FAQ's"
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список товаров
        $faqsList = Faq::getFaqsList();

        // Подключаем вид
        require_once(ROOT . '/views/admin_faq/index.php');
        return true;
    }

    /**
     * Action для страницы "Добавить товар"
     */
    public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список категорий для выпадающего списка
        $categoriesList = Category::getCategoriesListAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $options['question'] = $_POST['question'];
            $options['user_id'] = $_POST['user_id'];
            $options['category_id'] = $_POST['category_id'];
            $options['answer'] = $_POST['answer'];
            $options['is_new'] = $_POST['is_new'];
            $options['status'] = $_POST['status'];

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($options['question']) || empty($options['question'])) {
                $errors[] = 'Заполните поля';
            }

            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новый товар
                Faq::createFaq($options);

                // Перенаправляем пользователя на страницу управлениями товарами
                header("Location: /admin/faq");
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_faq/create.php');
        return true;
    }

    /**
     * Action для страницы "Редактировать товар"
     */
    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список категорий для выпадающего списка
        $categoriesList = Category::getCategoriesListAdmin();

        // Получаем данные о конкретном заказе
        $faq = Faq::getFaqById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования. При необходимости можно валидировать значения
            $options['question'] = $_POST['question'];
            $options['category_id'] = $_POST['category_id'];
            $options['user_id'] = $_POST['user_id'];
            $options['answer'] = $_POST['answer'];
            $options['is_new'] = $_POST['is_new'];
            $options['status'] = $_POST['status'];

            // Сохраняем изменения
            if (Faq::updateFaqById($id, $options)) {


                // Если запись сохранена
                // Проверим, загружалось ли через форму изображение
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {

                    // Если загружалось, переместим его в нужную папке, дадим новое имя
                   move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/faqs/{$id}.jpg");
                }
            }

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/faq");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_faq/update.php');
        return true;
    }

    /**
     * Action для страницы "Удалить товар"
     */
    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем товар
            Faq::deleteFaqById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/faq");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_faq/delete.php');
        return true;
    }

}
