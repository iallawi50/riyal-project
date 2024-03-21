<?php component("header") ?>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="text-center mt-5">تفاصيل الدفع</h2>
            <div class="row mt-5">
                <div class="col-md-6 offset-md-3 text-center">
                    <img src="<?= asset("/imgs/visa-mastercard-logos.jpg") ?>" alt="Mastercard Logo" class="ml-2" style="height: 50px; ">
                </div>
            </div>
            <form action="" method="post">
                <div class="form-group mb-4">
                    <label class="mb-2" for="card_number">رقم البطاقة:</label>
                    <input type="text" class="form-control" id="card_number" name="card_number" required>
                </div>
                <div class="form-group mb-4">
                    <label class="mb-2" for="expiry_date">تاريخ الانتهاء:</label>
                    <input type="text" class="form-control" id="expiry_date" name="expiry_date" placeholder="MM/YY" required>
                </div>
                <div class="form-group mb-4">
                    <label class="mb-2" for="cvv">CVV:</label>
                    <input type="text" class="form-control" id="cvv" maxlength="3" name="cvv" required>
                </div>
                <button type="submit" class="btn btn-primary">إتمام الدفع</button>
            </form>
        </div>
    </div>

</div>

<?php component("footer") ?>