<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فاتورة</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .invoice {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }

        .invoice-header {
            text-align: center;
        }

        .invoice-details {
            margin-bottom: 20px;
        }

        .invoice-summary {
            margin-bottom: 20px;
        }

        .invoice-summary table {
            width: 100%;
        }

        .invoice-summary th,
        .invoice-summary td {
            border: 1px solid #ddd;
            padding: 20px;
            text-align: center;
        }

        input,
        .store {
            width: 80%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .invoice-total {
            text-align: right;
        }

        .payment-section {
            display: flex;
        }

        .payment-section div:first-child {
            display: flex;
            align-items: center;
            flex: 1;
            gap: 10px;
        }

        .payment-button {
            text-align: center;
            margin-top: 10px;
        }

        .payment-button {
            padding: 10px 20px;
            background-color: green;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .payment-button button:hover {
            background-color: darkgreen;
        }
    </style>
</head>

<body dir=rtl>
    <form action="" method="post" id="invoice-form">
        <div class="invoice">
            <h1 class="invoice-header">فاتورة</h1>
            <div class="invoice-details">
                 <input hidden name="invoice" id="invoice-number"></input>
                اسم المتجر
                <select type="text" class="store" name="store">
                    <?php foreach ($stores as $store) : ?>

                        <option value="<?= $store->id ?>"><?= $store->name ?></option>

                    <?php endforeach ?>
                </select>
            </div>
            <div class="invoice-summary">
                <table id="product-table">
                    <tr>
                        <th>اسم المنتج</th>
                        <th>السعر</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="product" placeholder="اسم المنتج"></td>
                        <td><input type="number" name="price" placeholder="السعر" class="product-price"></td>
                    </tr>
                </table>
                <p>اجمالي المبلغ: <span id="total-amount">0.00</span></p>
                <p>الدفع عن طريق "ريال"</p>
            </div>
            <div class="payment-section">
                <div>
                    <p>رقم جوال العميل</p>
                    <input type="text" name="mobile" id="">
                </div>
            </div>
            <button class="payment-button" type="submit">ادفع</button>

        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {


            document.getElementById('invoice-number').value = Math.floor(Math.random() * 1000000);



            const productPrices = document.querySelectorAll('.product-price');
            const totalAmount = document.getElementById('total-amount');
            let sum = 0;
            productPrices.forEach(function(priceInput) {
                priceInput.addEventListener('input', function() {
                    sum = 0;
                    productPrices.forEach(function(priceInput) {
                        sum += parseFloat(priceInput.value) || 0;
                    });
                    totalAmount.textContent = sum.toFixed(2);
                });
            });
        });
    </script>
</body>

</html>