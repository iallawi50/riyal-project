<?php component("header") ?>



<div class="container mt-5">



    <form method=post class="shadow col-md-8  mx-auto" action="./register">

        <div class="p-3">
            <h1 class="text-center">تسجيل مستخدم جديد</h1>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">الاسم</label>
                <input type="text" name="name" value="<?= $name ?? "" ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <p class="text-danger"><?= $errors["name"] ?? '' ?></p>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">رقم الجوال</label>
                <input type="text" name="mobile" value="<?= $mobile ?? "" ?>" class="form-control" maxlength="10" id="exampleInputEmail1" aria-describedby="emailHelp">
                <p class="text-danger"><?= $errors["mobile"] ?? '' ?></p>

            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">كلمة المرور</label>
                <input type="password" name="password" value="<?php $password ?? "" ?>" class="form-control" id="exampleInputPassword1">
                <p class="text-danger"><?= $errors["password"] ?? '' ?></p>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">كلمة المرور</label>
                <input type="password" name="confirmpassword" class="form-control" id="exampleInputPassword1">
            </div>

            <div class="mb-3">
                <label class="form-label">نوع الحساب</label>
                <div>
                    <input type="radio" name="is_store" id="client" value="0" checked><label for="client">&nbsp;عميل</label>
                    <br>
                    <input type="radio" name="is_store" id="services" value="1"><label for="services">&nbsp; تاجر</label>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-success rounded-0 col-12">تسجيل جديد</button>
    </form>
</div>
<?php component("footer") ?>