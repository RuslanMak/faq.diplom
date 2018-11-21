<?php

return array(
    // Категория вопросов:
    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2', // actionCategory в CatalogController   
    'category/([0-9]+)' => 'catalog/category/$1', // actionCategory в CatalogController
    // Пользователь:
    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',
    // Управление FAQ's:
    'admin/faq/teme/([0-9]+)' => 'adminFaq/teme/$1',
    'admin/faq/create' => 'adminFaq/create',
    'admin/faq/needanswer' => 'adminFaq/needanswer',
    'admin/faq/update/([0-9]+)' => 'adminFaq/update/$1',
    'admin/faq/delete/([0-9]+)' => 'adminFaq/delete/$1',
    'admin/faq' => 'adminFaq/index',
    // Управление темами:
    'admin/category/create' => 'adminCategory/create',
    'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
    'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
    'admin/category' => 'adminCategory/index',
    // Управление users:
    'admin/user/create' => 'adminUser/create',
    'admin/user/update/([0-9]+)' => 'adminUser/update/$1',
    'admin/user/delete/([0-9]+)' => 'adminUser/delete/$1',
    'admin/user' => 'adminUser/index',
    // Админпанель:
    'admin' => 'admin/index',
    // Задать вопрос:
    'question' => 'question/index',
    // О магазине
    'about' => 'site/about',
    // 404
    '((.|\n)+)' => 'site/404',
    // Главная страница
    'index.php' => 'site/index', // actionIndex в SiteController
    '' => 'site/index', // actionIndex в SiteController
);
