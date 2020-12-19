<div class="card shadow mb-4">
    <div
        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">
            {{ __("รายการแทงหวย") }}
        </h6>
    </div>
    <div class="card-body">

        <div class="row border-bottom-success">
            <div class="col-md-6">
                <strong>ชื่อ</strong><span class="text-primary" style="padding-left: 5px;">{{ $bet_customer }}</span>
            </div>
            <div class="col-md-6">
                <strong>เบอร์</strong><span class="text-primary" style="padding-left: 5px;">{{ $bet_mobile }}</span>
            </div>
        </div>
    
        <br>
        
        <div class="row">
            <div class="col-md-3 text-center">
                <strong>
                    เลขโพย
                </strong>
            </div>
            <div class="col-md-3 text-center">
                <strong>
                    จำนวนเงิน(บาท)
                </strong>
            </div>
            <div class="col-md-3 text-center">
                <strong>
                    ประเภทหวย
                </strong>
            </div>
            <div class="col-md-3 text-center">
                <strong>
                    รางวัลถูกหวย
                </strong>
            </div>
        </div>

        @foreach ($list_bet_number as $item)
            <div class="row">
                <div class="col-md-3 text-center">
                    <strong>
                        {{ $item['bet_number'] }}
                    </strong>
                </div>
                <div class="col-md-3 text-center">
                    <strong>
                        {{ $item['amount_baht'] }}
                    </strong>
                </div>
                <div class="col-md-3 text-center">
                    <strong>
                        {{ $item['bet_type'] }}
                    </strong>
                </div>
                <div class="col-md-3 text-center">
                    <strong>
                        {{ $item['amount_reward'] }}
                    </strong>
                </div>
            </div>
        @endforeach
        
        <br/>

        <div class="row">
            <div class="col-md-2">
            </div>
            
            <div class="col-md-4">
                <button type="button" class="btn btn-block btn-outline-danger" wire:click="clearBet">
                    {{ __('ลบโพยแทงหวย')}}
                </button>
            </div>
            <div class="col-md-4">
                <button type="button" class="btn btn-block btn-outline-primary" wire:click="confirmBet">
                    {{ __('ส่งโพยแทงหวย')}}
                </button>
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div>
</div>
