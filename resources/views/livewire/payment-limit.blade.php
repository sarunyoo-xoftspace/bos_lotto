<div>
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-12">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-right">

                        <div class="col-xl-6 col-md-8 mb-10">
                            <h1 class="h3 mb-0 text-gray-800">
                                {{ __('รับผิดชอบการจ่าย') }}
                            </h1>
                            <small>
                                {{ __('กรณี รองรับหวยรัฐบาลไทย') }}
                            </small>
                        </div>

                        <div class="col-xl-6 col-md-4 mb-2 text-right">

                            @if($mode != 'list')
                                <a href="#" class="btn btn-primary btn-circle btn-lg" wire:click="update">
                                    <i class="fas fa-save"></i>
                                </a>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-md-12 mb-12">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                
                    @if($mode == 'list')
                        <ul class="list-group">
                            
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <strong>
                                    ###
                                </strong>
                                <strong>
                                    ประเภทหวย
                                </strong>
                                <strong>
                                    จำนวนวงเงินรับผิดชอบ
                                </strong>
                            </li>

                            @foreach($betTypes as $item)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>
                                        <a href="javascript:void(0)" class="btn btn-outline-danger btn-circle btn-sm" wire:click="edit({{ $item->id }})">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                    </span>
                                    <strong>
                                        {{ $item->name }}
                                    </strong>
                                    <span class="badge badge-danger" style="font-size: 16px;">
                                        {{ number_format($item->payment_limit,2) }}
                                    </span>
                                </li>
                            @endforeach
                        </ul>

                    @else 

                        <div class="row form-row no-gutters">
                            <div class="col-xl-6 col-md-6 mb-6 form-group">
                                <label for="betTypeName">
                                    {{ __('label.betTypeName') }}
                                </label>
                                <input type="text" class="form-control calendar @error('betTypeName') is-invalid @enderror" id="betTypeName" wire:model="betTypeName" readonly>
                                @error('betTypeName')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
        
                            <div class="col-xl-6 col-md-6 mb-6 form-group">
                                <label for="paymentLimitAmount">
                                    {{ __('ยอดเงินแทงที่รับผิดชอบ') }}
                                </label>
                                <input type="text" class="form-control timepicker @error('paymentLimitAmount') is-invalid @enderror" id="paymentLimitAmount" wire:model="paymentLimitAmount">
                                @error('paymentLimitAmount')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                        </div>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>

</div>