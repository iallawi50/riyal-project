<?php component("header") ?>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="text-center mt-5">الغاء الطلب</h2>
            <div class="row mt-5">
            </div>
            <form action="" method="post">
                <div class="form-group mb-4">
                    <label class="mb-2" for="cancel">سبب الإلغاء:</label>
                    <textarea name="reason" id="cancel" class="form-control" rows="5"></textarea>
                </div>
                <button type="submit" class="btn btn-danger">تأكيد الإلغاء</button>
            </form>
        </div>
    </div>

</div>

<?php component("footer") ?>