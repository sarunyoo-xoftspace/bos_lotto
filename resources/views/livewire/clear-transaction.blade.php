<div>
    <div class="card shadow">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">
                ลบรายการทั้งหมด
            </h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    @if ($confirmingStatus)
   

                        @if ($processScoreClear == 100)
                            <button class="btn btn-block btn-success" wire:click="clearProcessScore">    
                                ดำเนินการลบรายการทั้งหมดเรียบร้อยแล้ว
                            </button>
                        @else 
                            <button class="btn btn-block btn-danger" wire:click="confirimingAction">
                                {{ __('คุณต้องการลบรายการนี้หรือไม่ ?')}}
                            </button>     
                        @endif

                    @else 
                        <button class="btn btn-block btn-danger" wire:click="getConfirmStatus">
                            ลบรายการทั้งหมด
                        </button>        
                    @endif
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    {{ $processScoreClear }} %
                    <div class="progress"> 
                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ $processScoreClear }}%"
                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
