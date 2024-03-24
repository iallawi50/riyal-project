<?php component("header") ?>
<form method=post class="shadow col-md-8 mt-5 mx-auto" action="">


    <div class="p-3">
        <div class="text-center">
            <img src="<?= asset("imgs/logo.png") ?>" width="150px" alt="">
        </div>
        <h1 class="text-center">معلومات المتجر</h1>
        <div class="mb-3">
            <label for="name" class="form-label">اسم المتجر</label>
            <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
            <p class="text-danger"><?= $errors["name"] ?? '' ?></p>
        </div>
        <div class="mb-3">
            <label for="link" class="form-label">رابط المتجر</label>
            <input name="link" id=link type="url" class="form-control" />
            <p class="text-danger"><?= $errors["link"] ?? '' ?></p>
        </div>

    </div>

    <button type="submit" class="btn btn-success rounded-0 col-12">حفظ</button>
</form>
<?php component("footer") ?>