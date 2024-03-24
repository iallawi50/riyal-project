<?php component("header") ?>

<div class="welcome">
    <h1>ريال</h1>
    <h3 class="mb-5">طريقة دفع آمنة وتضمن حقوقك</h3>
    <div class="row col-3 gap-1 text-center">

        <?php if (user()->id) : ?>
            <?php if (user()->is_store) : ?>

                <?php if (user()->store()) : ?>

                <?php else : ?>

                    <a href="<?= home() ?>/store/create" class="col-5 mx-auto btn btn-custom">أضف بيانات المتجر</a>

                <?php endif ?>
                <a href="./store/orders" class="col-5 mx-auto  btn btn-custom">الرصيد والطلبات</a>

            <?php else : ?>

                <a href="./invoices" class="col-5 mx-auto btn btn-custom">فواتيري</a>
                <a href="./orders" class="col-5 mx-auto  btn btn-custom">طلباتي</a>
            <?php endif ?>
        <?php else : ?>


            <a href="<?= home() ?>/login" class="col-5 mx-auto  btn btn-custom">تسجيل دخول</a>
            <a href="<?= home() ?>/register" class="col-5 mx-auto btn btn-custom">تسجيل جديد</a>


        <?php endif ?>
    </div>
</div>

<?php component("footer") ?>