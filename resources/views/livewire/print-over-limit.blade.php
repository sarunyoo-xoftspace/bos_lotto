<br>
<br>
<div class="text-center">
    <h5>
        รายการโพยหวยเกินที่กำหนดไว้
    </h5>
</div>

<table class="table table-bordered">
    <thead>
        <th class="text-center">
            ประเภทหวย
        </th>
        <th class="text-center">
            เลขแทง
        </th>
        <th class="text-right">
            จำนวนเงินที่แทง
        </th>
        <th class="text-right">
            เงินที่กำหนดไว้
        </th>
        <th class="text-right">
            จำนวนเงินกำหนด
        </th>
    </thead>

    <tbody>
        @foreach ($summaryTrans as $item)
            <tr>
                <td class="text-center">
                    {{ $item->type_name }}
                </td>
                <td class="text-center">
                    {{ $item->bet_number }}
                </td>
                <td class="text-right">
                    {{ number_format($item->bet_amount, 2) }}
                </td>
                <td class="text-right text-primary">
                    {{ number_format($item->limit_payment, 2) }}
                </td>
                <td class="text-right text-danger">
                    {{ number_format($item->payment_over_limit, 2) }}
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="2" class="text-right">
                <strong>
                    รวมเงินทั้งหมด
                </strong>
            </td>
            <td class="text-right text-success">
                <strong>
                    {{ number_format($sumaryBetAmount, 2) }} บาท
                </strong>
            </td>
            <td>
                &nbsp;
            </td>
            <td class="text-right text-danger">
                <strong>
                    {{ number_format($summaryPaymentOverLimit, 2) }} บาท
                </strong>
            </td>
        </tr>
    </tfoot>
</table>
