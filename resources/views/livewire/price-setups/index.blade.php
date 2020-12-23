<div>
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-12">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-right">

                        <div class="col-xl-6 col-md-8 mb-10">
                            <h1 class="h3 mb-0 text-gray-800">
                                {{ __('label.price_setup_title') }}
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
                        @foreach($betTypes as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>
                                    <a href="javascript:void(0)" class="btn btn-warning btn-circle btn-sm" wire:click="edit({{ $item->id }})">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                </span>
                                {{ $item->name }}
                                <span class="badge badge-primary badge-info" style="font-size: 16px;">
                                    {{ $item->reward_amount_baht }}
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
                            <label for="betTypeRewardAmount">
                                {{ __('label.betTypeRewardAmount') }}
                            </label>
                            <input type="text" class="form-control timepicker @error('betTypeRewardAmount') is-invalid @enderror" id="betTypeRewardAmount" wire:model="betTypeRewardAmount">
                            @error('betTypeRewardAmount')
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
