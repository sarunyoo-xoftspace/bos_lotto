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
    <div class="col-xl-6 col-md-6 mb-6 form-group">
        <input type="text" class="form-control @error('numberDoorInput') is-invalid @enderror" wire:model="numberDoorInput" wire:keydown="genNumberRood" placeholder="กรอกตัวเลข 1 ตัว" maxlength="1"/>
        @error('numberDoorInput')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-xl-6 col-md-6 mb-6 form-group">
        <input type="text" class="form-control @error('bathBetPerNumber') is-invalid @enderror" wire:model="bathBetPerNumber" placeholder="จำนวนเงินแทง" maxlength="8"/>
        @error('bathBetPerNumber')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

</div>
<div class="row">
    <div class="col-xl-6 col-md-6 mb-6 form-group">
        <button type="button" class="btn btn-block btn-primary" wire:click="genNumberRood">
            {{ __('แสดงเลขวิ่ง') }}
        </button>
    </div>
    <div class="col-xl-6 col-md-6 mb-6 form-group">
        <button type="button" class="btn btn-block btn-warning" wire:click="confirm19Door">
            {{ __('ยืนยันการแทง') }}
        </button>
    </div>
</div>

@if(!empty($roodNumberArray))

@php
    $column = 1;
@endphp

    @php 

        $indexFindValue = 0;
        $row_count = 0;
    @endphp 


    @for($i = 0; $i <= (count($roodNumberArray) % 4) + 1; $i++)

        <div class="row">

            @if ($indexFindValue < ( count($roodNumberArray) - 1))
                
                @for($k = 0; $k <= 3; $k++)
                    <div class="col-xl-3 col-md-3 mb-3">
                        <button class="btn btn-block btn-outline-danger">
                            {{ $roodNumberArray[$indexFindValue] }}
                        </button>
                    </div>

                    @if($indexFindValue == ( count($roodNumberArray) - 1))
                        @php
                          break;
                        @endphp
                    @endif

                    @php
                        $indexFindValue++;
                    @endphp 
                    
                @endfor
            
            @endif

        </div>

        @php 
            $row_count += 4;
        @endphp 

    @endfor

@endempty
