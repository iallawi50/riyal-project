<?php component("header") ?>
<div class="container mt-5">


    <form method=post class="shadow col-md-8  mx-auto" action="./login">

        <div class="p-3">
            <h1 class="text-center">تسجيل دخول</h1>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">رقم الجوال</label>
                <input type="text" name="mobile" value="<?= $mobile ?? "" ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <p class="text-danger"><?= $errors["mobile"] ?? '' ?></p>

            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">كلمة المرور</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                <p class="text-danger"><?= $errors ?? '' ?></p>
            </div>

        </div>

        <button type="submit" class="btn btn-success rounded-0 col-12">دخول</button>
    </form>
</div>
<?php component("footer") ?>