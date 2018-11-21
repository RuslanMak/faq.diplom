<?php

/**
 * Класс Faq - модель для работы с товарами
 */
class Faq
{

    // Количество отображаемых товаров по умолчанию
    const SHOW_BY_DEFAULT = 6;

    /**
     * Возвращает список товаров в указанной категории
     * @param type $categoryId <p>id категории</p>
     * @param type $page [optional] <p>Номер страницы</p>
     * @return type <p>Массив с товарами</p>
     */
    public static function getFaqsListByCategory($categoryId, $page = 1)
    {
        $limit = Faq::SHOW_BY_DEFAULT;
        // Смещение (для запроса)
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT id, question, answer, is_new FROM faq '
                . 'WHERE status = 1 AND category_id = :category_id '
                . 'ORDER BY id ASC LIMIT :limit OFFSET :offset';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        $i = 0;
        $faqs = array();
        while ($row = $result->fetch()) {
            $faqs[$i]['id'] = $row['id'];
            $faqs[$i]['question'] = $row['question'];
            $faqs[$i]['answer'] = $row['answer'];
            $faqs[$i]['is_new'] = $row['is_new'];
            $i++;
        }
        return $faqs;
    }

    /**
     * Возвращает продукт с указанным id
     * @param integer $id <p>id товара</p>
     * @return array <p>Массив с информацией о товаре</p>
     */
    public static function getFaqById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM faq WHERE id = :id';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        return $result->fetch();
    }

    /**
     * Возвращаем количество товаров в указанной категории
     * @param integer $categoryId
     * @return integer
     */
    public static function getTotalFaqsInCategory($categoryId)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT count(id) AS count FROM faq WHERE status="1" AND category_id = :category_id';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':category_id', $categoryId, PDO::PARAM_INT);

        // Выполнение коменды
        $result->execute();

        // Возвращаем значение count - количество
        $row = $result->fetch();
        return $row['count'];
    }

    /**
     * Возвращает список товаров с указанными индентификторами
     * @param array $idsArray <p>Массив с идентификаторами</p>
     * @return array <p>Массив со списком товаров</p>
     */
    public static function getFaqsByIds($idsArray)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Превращаем массив в строку для формирования условия в запросе
        $idsString = implode(',', $idsArray);

        // Текст запроса к БД
        $sql = "SELECT * FROM faq WHERE status='1' AND id IN ($idsString)";

        $result = $db->query($sql);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Получение и возврат результатов
        $i = 0;
        $faqs = array();
        while ($row = $result->fetch()) {
            $faqs[$i]['id'] = $row['id'];
            $faqs[$i]['user_id'] = $row['user_id'];
            $faqs[$i]['question'] = $row['question'];
            $i++;
        }
        return $faqs;
    }

    /**
     * Возвращает список рекомендуемых товаров
     * @return array <p>Массив с товарами</p>
     */
    public static function getRecommendedFaqs()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Получение и возврат результатов
        $result = $db->query('SELECT id, question, is_new FROM faq '
                . 'WHERE status = "1" '
                . 'ORDER BY id DESC');
        $i = 0;
        $faqsList = array();
        while ($row = $result->fetch()) {
            $faqsList[$i]['id'] = $row['id'];
            $faqsList[$i]['question'] = $row['question'];
            $faqsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }
        return $faqsList;
    }

    /**
     * Возвращает список товаров
     * @return array <p>Массив с товарами</p>
     */
    public static function getFaqsList()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Получение и возврат результатов
        $result = $db->query('SELECT id, question, answer, status FROM faq ORDER BY id ASC');
        $faqsList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $faqsList[$i]['id'] = $row['id'];
            $faqsList[$i]['question'] = $row['question'];
            $faqsList[$i]['answer'] = $row['answer'];
            $faqsList[$i]['status'] = $row['status'];
            $i++;
        }
        return $faqsList;
    }

    /**
     * Удаляет товар с указанным id
     * @param integer $id <p>id товара</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function deleteFaqById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM faq WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Редактирует товар с заданным id
     * @param integer $id <p>id товара</p>
     * @param array $options <p>Массив с информацей о товаре</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function updateFaqById($id, $options)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE faq
            SET 
                question = :question,
                category_id = :category_id,
                user_id = :user_id,
                answer = :answer, 
                is_new = :is_new,
                status = :status
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':question', $options['question'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':user_id', $options['user_id'], PDO::PARAM_INT);
        $result->bindParam(':answer', $options['answer'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Добавляет новый товар
     * @param array $options <p>Массив с информацией о товаре</p>
     * @return integer <p>id добавленной в таблицу записи</p>
     */
    public static function createFaq($options)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO faq '
                . '(question, user_id, category_id,'
                . 'answer, is_new, status)'
                . 'VALUES '
                . '(:question, :user_id, :category_id,'
                . ':answer, :is_new, :status)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':question', $options['question'], PDO::PARAM_STR);
        $result->bindParam(':user_id', $options['user_id'], PDO::PARAM_INT);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':answer', $options['answer'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $db->lastInsertId();
        }
        // Иначе возвращаем 0
        return 0;
    }

    /**
     * Возвращает путь к изображению
     * @param integer $id
     * @return string <p>Путь к изображению</p>
     */
    public static function getImage($id)
    {
        // Название изображения-пустышки
        $noImage = 'no-image.jpg';

        // Путь к папке с товарами
        $path = '/upload/images/faqs/';

        // Путь к изображению товара
        $pathToFaqImage = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToFaqImage)) {
            // Если изображение для товара существует
            // Возвращаем путь изображения товара
            return $pathToFaqImage;
        }

        // Возвращаем путь изображения-пустышки
        return $path . $noImage;
    }

}
