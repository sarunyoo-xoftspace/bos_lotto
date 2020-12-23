<div>
    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                {{ __('จำนวนเงินการแทงหวย')}}
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ number_format($summary_amount_bet,2) }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                จำนวนโพย
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $count_customer }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- Processd --}}
    <div class="card shadow">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">
                ขั้นตอนการทำงาน
            </h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-block btn-info" wire:click="processBetNumber">
                        @if($progresScore == 100)
                            {{ __('คำนวนรายการคนที่ถูกหวยสำเร็จ !!!') }}
                        @else 
                            {{ __('label.lottery_processing') }}
                        @endif            
                    </button>        
                </div>
            </div>
            
            <div class="row" style="display: {{ $cssDisplay }};">
                <div class="col-md-12">
                    <br>
                    {{ $progresScore }} %
                    <div class="progress"> 
                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ $progresScore }}%"
                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>