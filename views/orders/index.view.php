<?php

use App\Models\Transaction;
use Carbon\Carbon;

component("header") ?>

<div class="container mt-5">
    <h1 class="my-5 text-center">الطلبات</h1>
    <?php


    ?>
    <table class="table table-sm table-primary text-center">
        <thead>
            <tr>
                <th scope="col">رقم الفاتورة</th>
                <th scope="col">اسم المتجر</th>
                <th scope="col">تاريخ الفاتورة</th>
                <th scope="col">المبلغ المطلوب</th>
                <th scope="col">حالة الفاتورة</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            ?>
            <?php foreach (user()->orders() as $order) : ?>

                <?php

                checkAndUpdateInvoiceStatus($order->id, $order->created_at, $order->status);
                ?>
                <tr>
                    <th scope="row"><?= $order->invoice_number ?></th>
                    <td><a href="<?= isset($order->seller()->store()[0]->link)  ? "https://" : "" ?><?= $order->seller()->store()[0]->link  ?? "" ?>"><?= $order->seller()->store()[0]->name ?? "غير معروف" ?></a></td>
                    <td><?= Carbon::parse($order->created_at)->format("Y-m-d") ?></td>
                    <td><?= $order->amount ?></td>
                    <td><?php

                        switch ($order->status) {
                            case 0:
                                echo "بإنتظار العميل";
                                break;
                            case 1:
                                echo "مقبولة";
                                break;
                            case 2:
                                echo "مرفوضة";
                                break;

                            default:
                                # code...
                                break;
                        }

                        ?></td>
                    <td>
                        <div class="flex gap-3">
                            <div class="btn-group btn-group-sm">


                                <?php if ($order->status == 0) : ?>
                                    <a href="./orders/cancel?id=<?= $order->id ?>" form="cancel-<?= $order->id ?>" class="btn btn-danger  mx-1 rounded-2">الغاء</a>
                                    <a href="./orders/complete?id=<?= $order->id ?>" class="btn btn-success  mx-1 rounded-2">قبول</a>
                                <?php endif ?>
                            </div>
                        </div>
                    </td>
                </tr>

                <?php if ($order->status == 0) : ?>
                    <form action="./transaction/submit" method="post" id="cancel-<?= $order->id ?>">
                        <input type="text" name="id" hidden value="<?= $order->id ?>">
                    </form>
                <?php endif ?>

            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?php component("footer") ?>