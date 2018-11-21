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
                <div class="faq-details"><!--faq-details-->
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="view-faq">
                                <img src="<?php echo Faq::getImage($faq['id']); ?>" alt="" />
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="faq-information"><!--/faq-information-->

                                <?php if ($faq['is_new']): ?>
                                    <img src="/template/images/faq-details/new.jpg" class="newarrival" alt="" />
                                <?php endif; ?>

                                <h2><?php echo $faq['name']; ?></h2>
                                <p>Код товара: <?php echo $faq['code']; ?></p>
                                <span>
                                    <span>US $<?php echo $faq['price']; ?></span>
                                    <a href="#" data-id="<?php echo $faq['id']; ?>"
                                       class="btn btn-default add-to-cart">
                                        <i class="fa fa-shopping-cart"></i>В корзину
                                    </a>
                                </span>
                                <p><b>Наличие:</b> <?php echo Faq::getAvailabilityText($faq['availability']); ?></p>
                                <p><b>Производитель:</b> <?php echo $faq['brand']; ?></p>
                            </div><!--/faq-information-->
                        </div>
                    </div>
                    <div class="row">                                
                        <div class="col-sm-12">
                            <br/>
                            <h5>Описание товара</h5>
                            <?php echo $faq['description']; ?>
                        </div>
                    </div>
                </div><!--/faq-details-->

            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>