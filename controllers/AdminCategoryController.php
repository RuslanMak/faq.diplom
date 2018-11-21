<?php

/**
 * Контроллер AdminCategoryController
 * Управление темами вопросов-ответов в админпанели
 */
class AdminCategoryController extends AdminBase
{

    /**
     * Action для страницы "Управление темами"
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список категорий
        $categoriesList = Category::getCategoriesListAdmin();

        // Подключаем вид
        require_once(ROOT . '/views/admin_category/index.php');
        return true;
    }

    /**
     * Action для страницы "Добавить Тему"
     */
    public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $name = $_POST['name'];
            $sortOrder = $_POST['sort_order'];
            $status = $_POST['status'];

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($name) || empty($name)) {
                $errors[] = 'Заполните поля';
            }


            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новую Тему
                Category::createCategory($name, $sortOrder, $status);

                // Перенаправляем пользователя на страницу управлениями темами
                header("Location: /admin/category");
            }
        }

        require_once(ROOT . '/views/admin_category/create.php');
        return true;
    }

    /**
     * Action для страницы "Редактировать Тему"
     */
    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем данные о конкретной категории
        $category = Category::getCategoryById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена   
            // Получаем данные из формы
            $name = $_POST['name'];
            $sortOrder = $_POST['sort_order'];
            $status = $_POST['status'];

            // Сохраняем изменения
            Category::updateCategoryById($id, $name, $sortOrder, $status);

            // Перенаправляем пользователя на страницу управлениями темами
            header("Location: /admin/category");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_category/update.php');
        return true;
    }

    /**
     * Action для страницы "Удалить Тему"
     */
    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена

            // Удаляем все FAQ с данной категорией а потом саму категорию (тему)
            Faq::deleteFaqByCategoryId($id);

            // Удаляем Тему
            Category::deleteCategoryById($id);

            // Перенаправляем пользователя на страницу управлениями faq
            header("Location: /admin/category");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_category/delete.php');
        return true;
    }

}
