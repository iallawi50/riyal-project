<?php

use Carbon\Carbon;

component("header") ?>

<div class="container mt-5">
    <h1 class="my-5 text-center">فواتيري</h1>
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
            <?php foreach ($invoices as $invoice) : ?>

                <tr>
                    <th scope="row"><?= $invoice->invoice_number ?></th>
                    <td><a href="<?= isset($invoice->seller()->store()[0]->link)  ? "https://" : "" ?><?= $invoice->seller()->store()[0]->link  ?? "" ?>"><?= $invoice->seller()->store()[0]->name ?? "غير معروف" ?></a></td>
                    <td><?= Carbon::parse($invoice->created_at)->format("Y-m-d") ?></td>
                    <td><?= $invoice->product_price ?></td>
                    <td><?php

                        switch ($invoice->status) {
                            case 0:
                                echo "قيد الانتظار";
                                break;
                            case 1:
                                echo "مدفوعة";
                                break;
                            case 2:
                                echo "ملغية";
                                break;

                            default:
                                # code...
                                break;
                        }

                        ?></td>
                    <td>
                        <div class="flex gap-3">
                            <div class="btn-group btn-group-sm">


                                <?php if ($invoice->status == 0) : ?>
                                    <button form="cancel-<?= $invoice->id ?>" href="" class="btn btn-danger  mx-1 rounded-2">الغاء</button>
                                    <a href="./invoice/checkout?id=<?= $invoice->id ?>" class="btn btn-success  mx-1 rounded-2">دفع</a>
                                <?php endif ?>
                            </div>
                        </div>
                    </td>
                </tr>

                <?php if ($invoice->status == 0) : ?>
                    <form action="./invoice/cancel" method="post" id="cancel-<?= $invoice->id ?>">
                        <input type="text" name="id" hidden value="<?= $invoice->id ?>">
                    </form>
                <?php endif ?>

            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?php component("footer") ?>