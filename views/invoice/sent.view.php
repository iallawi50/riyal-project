<?php

use App\Core\Request;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فاتورة</title>

    <style>
        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
    </style>
</head>


<body>

    <div>
        <h1>تم ارسال الفاتورة</h1>
        <h3>رقم الفاتورة : <?= $invoice ?></h3>
    </div>


    <script>
        setTimeout(() => {
            window.location.href = "../invoices"
        }, 3000);
    </script>
</body>

</html>