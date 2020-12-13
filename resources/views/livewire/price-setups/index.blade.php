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
                            @if (!$isOpen)
                                <a href="#" class="btn btn-success btn-circle" wire:click="create">
                                    <i class="fas fa-plus"></i>
                                </a>
                            @else 
                                
                                @if ($actionMode == 'insert')
                                    <a href="#" class="btn btn-primary btn-circle" wire:click="store">
                                        <i class="fas fa-save"></i>
                                    </a>
                                @else 
                                    <a href="#" class="btn btn-primary btn-circle" wire:click="update({{ $price_setups_id }})">
                                        <i class="fas fa-save"></i>
                                    </a>
                                @endif
                                
                                
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($isOpen)
        @include('livewire.price-setups.create')
    @else 
        @include('livewire.price-setups.datatable')
    @endif
    
</div>

@section('js')
    @include('partial.notification')
@endsection