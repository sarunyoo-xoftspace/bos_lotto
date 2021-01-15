    


<div>
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-12">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-right">

                        <div class="col-xl-6 col-md-8 mb-10">
                            <h1 class="h3 mb-0 text-gray-800">
                                {{ __('label.batche') }}
                            </h1>
                            <small>
                            {{ __('กรณี รองรับหวยรัฐบาลไทย') }}
                            </small>
                        </div>
                        <div class="col-xl-6 col-md-4 mb-2 text-right">
                            
                            @if ($isExisting)
                                <a href="#" class="btn btn-primary btn-circle btn-lg" wire:click="save">
                                    <i class="fas fa-save"></i>
                                </a>
                                @if($confirming != $lotterId)
                                    <a href="#" class="btn btn-danger btn-circle btn-lg" wire:click="confirmDestoy">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                @endif
                            @else
                                <a href="#" class="btn btn-success btn-circle btn-lg" wire:click="create">
                                    <i class="fas fa-plus"></i>
                                </a>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($isExisting)
        <div class="row">
            <div class="col-xl-12 col-md-12 mb-12">
                <div class="card shadow h-100 py-2">
                    <div class="card-body">
        
                        <div class="row form-row no-gutters">
                            <div class="col-xl-6 col-md-6 mb-6 form-group">
                                <label for="lotterDate">
                                    {{ __('label.lotterDate') }}
                                </label>
                                <input type="text" class="form-control calendar @error('lotterDate') is-invalid @enderror" id="lotterDate" wire:model="lotterDate">
                                @error('lotterDate')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
        
                            <div class="col-xl-6 col-md-6 mb-6 form-group">
                                <label for="lotterTime">
                                    {{ __('label.lotterTime') }}
                                </label>
                                <input type="text" class="form-control timepicker @error('lotterTime') is-invalid @enderror" id="lotterTime" wire:model="lotterTime">
                                @error('lotterTime')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        {{-- Confirm alert delete --}}
                        @if($confirming != "")
                            <div class="row form-row no-gutters">
                                <div class="col-xl-12 col-md-12 mb-12 form-group">
                                    <a href="javascript:void(0)" class="btn btn-danger btn-icon-split" wire:click="destoy">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">
                                        {{ __('label.msg_confrim_delete', ['attribute' =>  __('label.batche')])}}
                                        </span>
                                    </a>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
