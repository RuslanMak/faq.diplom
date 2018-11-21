<?php

/**
 * Контроллер CatalogController
 * Каталог товаров
 */
class CatalogController
{

    /**
     * Action для страницы "Каталог товаров"
     */
    public function actionIndex()
    {
        // Подключаем вид
        require_once(ROOT . '/views/catalog/index.php');
        return true;
    }

    /**
     * Action для страницы "Категория товаров"
     */
    public function actionCategory($categoryId, $page = 1)
    {
        // Список категорий для левого меню
        $categories = Category::getCategoriesList();

        // Список товаров в категории
        $categoryFaqs = Faq::getFaqsListByCategory($categoryId, $page);

        // Общее количетсво товаров (необходимо для постраничной навигации)
        $total = Faq::getTotalFaqsInCategory($categoryId);

        // Создаем объект Pagination - постраничная навигация
        $pagination = new Pagination($total, $page, Faq::SHOW_BY_DEFAULT, 'page-');

        // Подключаем вид
        require_once(ROOT . '/views/catalog/category.php');
        return true;
    }

}
