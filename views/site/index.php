<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-faqs">
                        <?php foreach ($categories as $categoryItem): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="/category/<?php echo $categoryItem['id']; ?>">
                                            <?php echo $categoryItem['name']; ?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Главная страница</h2>

                    <div class="col-sm-12">
                        <div class="faq-image-wrapper">
                            <div class="single-faqs">
                                <div class="faqinfo text-center">
                                    <img src="<?php echo Faq::getImage('faq'); ?>" alt="" />

                                    <?php if (!(User::isGuest())): ?>
                                        <h2><a href="/question/"><i class="fa fa-comment"></i> Задать вопрос</a></h2>
                                    <?php else: ?>
                                        <h2><a href="/user/login/"><i class="fa fa-lock"></i>Чтоби задать вопрос сделайте "Вход в систему"</a></h2>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div><!--features_items-->

        </div>
    </div>

</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>