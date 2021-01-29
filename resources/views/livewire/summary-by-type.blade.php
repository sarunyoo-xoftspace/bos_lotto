<div>

    <div class="row">
        <div class="col-xl-12 col-md-12 mb-12">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-right">

                        <div class="col-xl-6 col-md-6 mb-6">
                            <h1 class="h3 mb-0 text-gray-800">
                                {{ __('สรุปหวยรายประเภท') }}
                            </h1>
                            <small>
                                {{ __('สรุปรายการทุกเลข') }}
                            </small>
                        </div>

                        <div class="col-xl-6 col-md-6 mb-6 text-right">

                            {{--
                            <a href="#" target="_bank" class="btn btn-primary btn-circle btn-lg">
                                <i class="fas fa-print"></i>
                            </a>
                            --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <div class="col-6">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ __('รายการแทงหวย') }}
            </div>
            <div class="col-6 text-right">

                {{--
                <button type="button" class="btn btn-secondary text-right" wire:click="backToMainPage">
                    กลับ
                </button>
                --}}

            </div>
            </h6>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-8">
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
                                เงินรางวัล
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
                                    <td class="text-right">
                                        {{ number_format($item->reward_amount_total, 2) }}
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
                                <td class="text-right">
                                    <strong>
                                        {{ number_format($sumaryBetAmount, 2) }} บาท
                                    </strong>
                                </td>
                                <td>
                                    &nbsp;
                                </td>
                            </tr>
                        </tfoot>

                    </table>

                </div>
                <div class="col-2">
                </div>
            </div>
        </div>
    </div>
</div>
