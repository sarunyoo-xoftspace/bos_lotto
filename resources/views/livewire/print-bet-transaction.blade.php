<br>
<br>
<div class="text-center">
    <h5>
        รายการนี้เป็น โพย ที่ไม่ถูกรางวัล
    </h5>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>
                {{ __('label.customer_name') }}
            </th>
            <th>
                {{ __('label.mobile') }}
            </th>
            <th class="text-center">
                {{ __('label.bet_number') }}
            </th>
            <th class="text-center">
                {{ __('label.bet_type') }}
            </th>
            <th class="text-right">
                {{ __('label.bet_amount') }}
            </th>
            <th class="text-right">
                ยอดเงินเกินกำหนดไว้
            </th>
        </tr>
    </thead>
    <tbody>
        @php
        $sum_bet_amount = 0;
        $sum_separate_bet_amount = 0;

        @endphp
        @foreach ($items as $item)
            <tr>
                <td>
                    {{ $item->bet_customer_name }}
                </td>
                <td>
                    {{ $item->bet_customer_mobile }}
                </td>
                <td class="text-center">
                    {{ $item->bet_number }}
                </td>
                <td class="text-center">
                    {{ $item->bet_type_name }}
                </td>
                <td class="text-right">
                    {{ number_format($item->bet_amount, 2) }}
                </td>
                <td class="text-right">
                    {{ number_format($item->separate_bet_amount, 2) }}
                </td>
            </tr>
            @php
            $sum_bet_amount += $item->bet_amount;
            $sum_separate_bet_amount += $item->separate_bet_amount;
            @endphp
        @endforeach

        <td colspan="4" class="text-center">
            <strong>
                รวมทั้งหมด
            </strong>
        </td>
        <td class="text-right">
            {{ number_format($sum_bet_amount, 2) }}
        </td>
        <td class="text-right">
            {{ number_format($sum_separate_bet_amount, 2) }}
        </td>

    </tbody>
</table>
