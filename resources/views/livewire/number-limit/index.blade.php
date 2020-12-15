<div>
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-12">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-right">

                        <div class="col-xl-6 col-md-6 mb-6">
                            <h1 class="h3 mb-0 text-gray-800">
                                {{ __('label.number_limit_title') }}
                            </h1>
                            <small>
                            {{ __('กรณี รองรับหวยรัฐบาลไทย') }}
                            </small>
                        </div>

                        <div class="col-xl-6 col-md-6 mb-6 text-right">
                            @if (!$isOpen)
                                <a href="#" class="btn btn-success btn-circle btn-lg" wire:click="create">
                                    <i class="fas fa-plus"></i>
                                </a>
                            @else

                                @if ($actionMode == 'insert')
                                    <a href="#" class="btn btn-primary btn-circle btn-lg" wire:click="store">
                                        <i class="fas fa-save"></i>
                                    </a>
                                @else
                                    <a href="#" class="btn btn-primary btn-circle btn-lg" wire:click="update({{ $number_limit_id }})">
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
        @include('livewire.number-limit.create')
    @else
        @include('livewire.number-limit.datatable')
    @endif

</div>
