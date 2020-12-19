<div class="row ">
    <div class="col-xl-12 col-md-12 mb-12 form-group">
        <p>
            <strong>
                {{ $bet_type_title }}
            </strong>
            <hr/>
        </p>
    </div>
</div>

<div class="row">
    <div class="col-xl-4 col-md-4 mb-4 form-group">
        <input type="text" class="form-control @error('twoNumbetBet') is-invalid @enderror" 
        wire:model="twoNumbetBet"  
        placeholder="กรอกตัวเลข 2 ตัว" maxlength="2"/>
        @error('twoNumbetBet')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="col-xl-4 col-md-4 mb-4 form-group">
        <input type="text" class="form-control @error('bathBetPerNumber') is-invalid @enderror" wire:model="bathBetPerNumber" placeholder="จำนวนเงินแทง" maxlength="8"/>
        @error('bathBetPerNumber')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="col-xl-4 col-md-4 mb-4 form-group">
        <button type="button" class="btn btn-block btn-warning" wire:click="addBetTwoDigit">
            {{ __('ยืนยันการแทง') }}
        </button>
    </div>

</div>
