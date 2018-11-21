<?php

/**
 * Контроллер FaqController
 * Товар
 */
class FaqController
{

    /**
     * Action для страницы просмотра товара
     * @param integer $faqId <p>id товара</p>
     */
    public function actionView($faqId)
    {
        // Список категорий для левого меню
        $categories = Category::getCategoriesList();

        // Получаем инфомрацию о товаре
        $faq = Faq::getFaqById($faqId);

        // Подключаем вид
        require_once(ROOT . '/views/faq/view.php');
        return true;
    }

}
