<?php

/**
 * Контроллер QuestionController
 * Кабинет пользователя
 */
class QuestionController
{

    /**
     * Action для страницы "Кабинет пользователя"
     */
    public function actionIndex()
    {
        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();

        // Получаем информацию о пользователе из БД
        $user = User::getUserById($userId);

        // Получаем список категорий для выпадающего списка
        $categoriesList = Category::getCategoriesListAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $options['question'] = $_POST['question'];
            $options['user_id'] = $_POST['user_id'];
            $options['category_id'] = $_POST['category_id'];
            $options['answer'] = '';
            $options['is_new'] = 1;
            $options['status'] = 0;

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($options['question']) || empty($options['question'])) {
                $errors[] = 'Заполните поля';
            }

            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новый faq
                Faq::createFaq($options);

                // Если запись добавлена
//                if ($id) {
//                    // Проверим, загружалось ли через форму изображение
//                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
//                        // Если загружалось, переместим его в нужную папке, дадим новое имя
//                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/faqs/{$id}.jpg");
//                    }
//                };

                // Перенаправляем пользователя на страницу управлениями faq
                header("Location: /question");
            }
        }


        // Подключаем вид
        require_once(ROOT . '/views/question/index.php');
        return true;
    }

    /**
     * Action для страницы "Редактирование данных пользователя"
     */
    public function actionEdit()
    {

    }

}
