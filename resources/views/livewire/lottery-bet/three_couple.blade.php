<div class="row ">
    <div class="col-xl-6 col-md-6 mb-6 form-group">
        <p>
            <strong>
                {{ $bet_type_title }}
            </strong>
            <hr/>
        </p>
    </div>
    <div class="col-xl-6 col-md-6 mb-6 form-group">
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="is_revest" wire:model="is_revest">
            <label class="custom-control-label" for="is_revest">กลับเลข</label>
        </div>
        <hr/>
    </div>
</div>

<div class="row">
    <div class="col-xl-4 col-md-4 mb-4 form-group">
        <input type="text" class="form-control @error('threeNumbetBet') is-invalid @enderror" 
        wire:model="threeNumbetBet"  
        placeholder="กรอกตัวเลข 3 ตัว" maxlength="3"/>
        @error('threeNumbetBet')
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
        <button type="button" class="btn btn-block btn-warning" wire:click="addBetThreeDigitCouple">
            {{ __('ยืนยันการแทง') }}
        </button>
    </div>

</div>
