<?php

/**
 * Контроллер CartController
 */
class SiteController
{

    /**
     * Action для главной страницы
     */
    public function actionIndex()
    {
        // Список категорий для левого меню
        $categories = Category::getCategoriesList();

        // Подключаем вид
        require_once(ROOT . '/views/site/index.php');
        return true;
    }

    /**
     * Action для страницы "О магазине"
     */
    public function actionAbout()
    {
        // Подключаем вид
        require_once(ROOT . '/views/site/about.php');
        return true;
    }

    /**
     * Action для страницы "О магазине"
     */
    public function action404()
    {
        // Список категорий для левого меню
        $categories = Category::getCategoriesList();
        // Подключаем вид
        require_once(ROOT . '/views/site/404.php');
        return true;
    }

}
