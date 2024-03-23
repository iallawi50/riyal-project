<?php

use App\Models\Transaction;
use Carbon\Carbon;

component("header") ?>

<div class="container mt-5">
    <h1 class="text-center">الرصيد</h1>
    <div class="container text-center">
        <div class="row gap-4 mt-5">
            <div class="col bg-primary text-white py-5">
                <h4>الرصيد الكلي</h4>
                <h5> <?= user()->credit()[0] + user()->credit()[1] ?></h5>
                ريال

            </div>
            <div class="col bg-primary text-white py-5">
                <h4>رصيد معلّق</h4>
                <h5>
                    <?= user()->credit()[1] ?? "0" ?>
                </h5>
                ريال

            </div>
            <div class="col bg-primary text-white py-5">
                <h4>أرباح يمكن سحبها</h4>
                <h5>
                    <?= user()->credit()[0] ?? "0" ?>
                </h5>
                ريال

            </div>
        </div>
    </div>
    <h1 class="my-5 text-center">الطلبات</h1>
    <table class="table table-sm table-primary text-center">
        <thead>
            <tr>
                <th scope="col">رقم الفاتورة</th>
                <th scope="col">اسم العميل</th>
                <th scope="col">رقم العميل</th>
                <th scope="col">تاريخ الفاتورة</th>
                <th scope="col">المبلغ المطلوب</th>
                <th scope="col">حالة الفاتورة</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>

            <?php foreach (user()->store_orders() as $order) : ?>
                <tr>
                    <th scope="row"><?= $order->invoice_number ?></th>
                    <td><?= $order->buyer()->name ?? "غير معروف" ?></td>
                    <td><?= $order->buyer()->mobile ?? "غير معروف" ?></td>
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
                        <?php if ($order->reason()) : ?>
                            <div class="btn-group btn-group-sm">
                                <button class="btn btn-danger" onclick='alert("<?= $order->reason()->reason ?>")'>سبب الالغاء</button>
                            </div>
                        <?php endif ?>
                    </td>

                </tr>


            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?php component("footer") ?>