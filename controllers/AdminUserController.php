<?php

/**
 * Контроллер AdminUserController
 * Управление FAQ's в админпанели
 */
class AdminUserController extends AdminBase
{

    /**
     * Action для страницы "Управление FAQ's"
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список пользователяов
        $usersList = User::getUsersList();

        // Подключаем вид
        require_once(ROOT . '/views/admin_users/index.php');
        return true;
    }

    /**
     * Action для страницы "Добавить пользователя"
     */
    public function actionCreate()
    {
        // Переменные для формы
        $name = false;
        $email = false;
        $password = false;
        $role = false;
        $result = false;

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            // Флаг ошибок
            $errors = false;

            // Валидация полей
            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
            if (User::checkEmailExists($email)) {
                $errors[] = 'Такой email уже используется';
            }

            if ($errors == false) {
                // Если ошибок нет
                // Регистрируем пользователя
                $result = User::register($name, $email, $password, $role);
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_users/create.php');
        return true;
    }

    /**
     * Action для страницы "Редактировать пользователя"
     */
    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем данные о конкретном пользователе
        $user = User::getUserById($id);

        // Флаг результата
        $result = false;

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования
            $name = $_POST['name'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $role = $_POST['role'];

            // Флаг ошибок
            $errors = false;

            // Валидируем значения
            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            if ($errors == false) {
                // Если ошибок нет, сохраняет изменения профиля
                $result = User::edit($id, $name, $password, $email, $role);
            }

            // Перенаправляем пользователя на страницу управлениями faq
            header("Location: /admin/user");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_users/update.php');
        return true;
    }

    /**
     * Action для страницы "Удалить пользователя"
     */
    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем пользователя
            User::deleteUserById($id);

            // Перенаправляем пользователя на страницу управлениями пользователяами
            header("Location: /admin/user");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_users/delete.php');
        return true;
    }

}
