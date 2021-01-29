<div>
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-12">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-right">

                        <div class="col-xl-6 col-md-6 mb-6">
                            <h1 class="h3 mb-0 text-gray-800">
                                {{ __('label.check_bet_correct') }}
                            </h1>
                            <small>
                                {{ __('กรณี รองรับหวยรัฐบาลไทย') }}
                            </small>
                        </div>

                        <div class="col-xl-6 col-md-6 mb-6 text-right">
                            <a href="{{ route('print-bet-correct') }}" target="_bank"
                                class="btn btn-primary btn-circle btn-lg">
                                <i class="fas fa-print"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br />

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">
                {{ __('label.check_bet_correct') }}
            </h6>
        </div>
        <div class="card-body">

            <div class='row'>
                <div class="col-xl-12 col-md-12 mb-12 input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">
                            {{ __('label.btn_search') }}
                        </span>
                    </div>
                    <input type="text" wire:model="search" class="form-control" aria-label="Default"
                        aria-describedby="inputGroup-sizing-default">
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-xl-12 col-md-12 mb-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    {{ __('label.customer_name') }}
                                </th>
                                <th class="text-center">
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

                            @foreach ($items as $item)
                                <tr>
                                    <td class="text-center">
                                        {{ $item->bet_customer_name }}
                                    </td>
                                    <td class="text-center">
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
                                        {{ number_format($item->payment_amount, 2) }}
                                    </td>
                                    <td class="text-right">
                                        {{ number_format($item->separate_bet_amount, 2) }}
                                    </td>
                                    <td class="text-right">
                                        {{ number_format($item->separate_payment_amount, 2) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $items->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
