<div>
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-12">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-right">

                        <div class="col-xl-6 col-md-6 mb-6">
                            <h1 class="h3 mb-0 text-gray-800">
                                {{ __('รายการแทงหวย เกินกำหนดไว้') }}
                            </h1>
                            <small>

                            </small>
                        </div>

                        <div class="col-xl-6 col-md-6 mb-6 text-right">
                            {{--
                            <a href="#" target="_bank" class="btn btn-primary btn-circle btn-lg">
                                <i class="fas fa-print"></i>
                            </a>
                            --}}
                            @if ($isShowDetail)
                                <a href="javascript::void(0)" class="btn btn-secondary btn-circle btn-lg"
                                    wire:click="backToMainPage">
                                    <i class="fas fa-backward"></i>
                                </a>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>

    @if ($isShowDetail)

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <div class="col-6">
                    <h6 class="m-0 font-weight-bold text-primary">
                        {{ __('รายการแทงหวย') }}
                </div>
                <div class="col-6 text-right">

                </div>
                </h6>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-6 text-right">
                    </div>
                    <div class="col-md-6">
                        <strong>ชื่อ</strong><span class="text-primary"
                            style="padding-left: 5px;">{{ $bet_customer }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 text-right">
                    </div>
                    <div class="col-md-6">
                        <strong>เบอร์</strong><span class="text-primary"
                            style="padding-left: 5px;">{{ $bet_mobile }}</span>
                    </div>
                </div>

                <br>

                <table class="table table-bordered">
                    <thead>
                        <th class="text-center">
                            <strong>
                                ลำดับ
                            </strong>
                        </th>
                        <th class="text-center">
                            <strong>
                                ประเภทหวย
                            </strong>
                        </th>
                        <th class="text-center">
                            <strong>
                                เลขโพย
                            </strong>
                        </th>
                        <th class="text-center">
                            <strong>
                                ยอดแทง
                            </strong>
                        </th>
                        <th class="text-center">
                            <strong>
                                ยอดที่กำหนดไว้
                            </strong>
                        </th>
                        <th class="text-center">
                            <strong>
                                ยอดเกินที่กำหนด
                            </strong>
                        </th>
                    </thead>
                    <tbody>
                        @php
                        $index = 1;
                        $summary_bet_amount = 0;
                        $summary_bet_amount_over = 0;
                        @endphp

                        @foreach ($bet_details as $item)
                            <tr>
                                <td class="text-center">
                                    {{ $index }}
                                </td>
                                <td class="text-center">
                                    <strong>
                                        {{ $item->bet_type_name }}
                                    </strong>
                                </td>
                                <td class="text-center">
                                    {{ $item->bet_number }}
                                </td>
                                <td class="text-right">
                                    {{ number_format($item->bet_amount, 2) }}
                                </td>
                                <td class="text-right">
                                    {{ number_format($item->payment_limit, 2) }}
                                </td>
                                <td class="text-right">
                                    {{ number_format($item->limit_amount_over, 2) }}
                                </td>
                            </tr>

                            @php
                            $index++;
                            $summary_bet_amount += $item->bet_amount;
                            $summary_bet_amount_over += $item->limit_amount_over;
                            @endphp

                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>
                                <strong>
                                    รวมเงินทั้งหมด
                                </strong>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td class="text-right">
                                <strong>
                                    {{ number_format($summary_bet_amount, 2) }}
                                    &nbsp;
                                    บาท
                                </strong>
                            </td>
                            <td>
                            </td>
                            <td class="text-right">
                                <strong>
                                    {{ number_format($summary_bet_amount_over, 2) }}
                                    &nbsp;
                                    บาท
                                </strong>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

    @else

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ __('รายการแทงหวย เกินกำหนดไว้') }}
                </h6>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-xl-2 col-md-2 mb-2">
                    </div>

                    <div class="col-xl-8 col-md-8 mb-8">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        {{ __('label.customer_name') }}
                                    </th>
                                    <th class="text-center">
                                        {{ __('label.mobile') }}
                                    </th>
                                    <th class="text-right">
                                        รวมเงินทั้งหมด
                                    </th>
                                    <th class="text-center">
                                        รายละเอียดโพย
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($items as $item)
                                    <tr>
                                        <td class="text-center">
                                            {{ $item->bet_customer_name }}
                                        </td>
                                        <td class="text-center">
                                            @empty($item->bet_customer_mobile)
                                                {{ __('ไม่ได้ระบุ') }}
                                            @endempty
                                            {{ $item->bet_customer_mobile }}
                                        </td>
                                        <td class="text-right">
                                            {{ number_format($item->sum_bet_amount, 2) }}
                                        </td>
                                        <td class="text-center">
                                            <a href="javascript:void(0)" class="btn btn-info btn-circle"
                                                wire:click="showDetail('{{ $item->bet_customer_name }}','{{ $item->bet_customer_mobile }}')">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-xl-2 col-md-2 mb-2">
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
