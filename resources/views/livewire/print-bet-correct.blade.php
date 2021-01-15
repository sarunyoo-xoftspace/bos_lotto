<table class="table table-sm">
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
            <th>
                {{ __('label.bet_type') }}
            </th>
            <th class="text-right">
                {{ __('label.bet_amount') }}
            </th>
            <th class="text-right">
                {{ __('label.payment_amount') }}
            </th>
            <th class="text-right">
                ยอดแทงที่เกินกำหนด
            </th>
            <th class="text-right">
                ยอดถูกรางวัลที่เกินกำหนด
            </th>
        </tr>
    </thead>
    <tbody>
        @php
            $sum_bet_amount = 0;
            $sum_payment_amount = 0;
            $sum_separate_bet_amount = 0;
            $sum_separate_payment_amount = 0;
        @endphp

        @foreach ($items as $item)
            <tr>
                <td>
                    {{ $item->bet_customer_name }}
                </td>
                <td>
                    {{ $item->bet_customer_mobile}}
                </td>
                <td>
                    {{ $item->bet_number}}
                </td>
                <td>
                    {{ $item->bet_type_name }}
                </td>
                <td class="text-right">
                    {{ number_format($item->bet_amount,2) }}
                </td>
                <td class="text-right">
                    {{ number_format($item->payment_amount,2) }}
                </td>
                <td class="text-right">
                    {{ number_format($item->separate_bet_amount,2) }}
                </td>
                <td class="text-right">
                    {{ number_format($item->separate_payment_amount,2) }}
                </td>
            </tr>
            @php 
                $sum_bet_amount += $item->bet_amount;
                $sum_payment_amount += $item->payment_amount;
                $sum_separate_bet_amount += $item->separate_bet_amount;
                $sum_separate_payment_amount += $item->separate_payment_amount;
            @endphp
        @endforeach
    </tbody>
    <tfoot>
        <td colspan="4">
            ยอดรวม
        </td>
        <td class="text-right">
            <strong>
                {{ number_format($sum_bet_amount,2) }}
            </strong>
        </td>
        <td class="text-right">
            <strong>
                {{ number_format($sum_payment_amount,2) }}
            </strong>
        </td>
        <td class="text-right">
            <strong>
                {{ number_format($sum_separate_bet_amount,2) }}
            </strong>
        </td>
        <td class="text-right">
            <strong>
                {{ number_format($sum_separate_payment_amount,2) }}
            </strong>
        </td>
    </tfoot>
</table>