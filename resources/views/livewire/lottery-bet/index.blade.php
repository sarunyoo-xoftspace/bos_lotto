<div class="card shadow mb-4">

    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">
            {{ __('เริ่มการแทงหวย / ซื้อรางวัล') }}
        </h6>
        <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="javascript:void(0)" role="button" id="dropdownMenuLink"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
        </div>
    </div>

    <div class="card-body">
        <div class="card mb-4 py-3 border-bottom-warning">
            <div class="card-body">

                <div class="row">
                    <div class="col-xl-4 col-md-4 mb-4 form-group">
                        <input type="text" class="form-control @error('customer_name') is-invalid @enderror"
                            id="customer_name" wire:model="customer_name"
                            placeholder="{{ __('label.customer_name') }}">
                        @error('customer_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-xl-4 col-md-4 mb-4 form-group">
                        <input type="text" class="form-control @error('mobile') is-invalid @enderror" id="mobile"
                            wire:model="mobile" placeholder="{{ __('label.mobile') }}">
                        @error('mobile')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-xl-4 col-md-4 mb-4">
                        <a href="javascript:void(0)" class="btn btn-block btn-success btn-icon-split"
                            id="btn-lotter-bet" wire:click="add_profile">
                            <span class="text">
                                {{ __('เริ่มการแทง') }}
                            </span>
                        </a>
                    </div>
                </div>

                {{-- Bet Number --}}
                <div class="row " style="display: {{ $show_component_bet }};">
                    @foreach ($bet_types as $item)
                        <div class="col-xl-3 col-md-3 mb-3 form-group">
                            <button type="button" class="btn btn-block btn-outline-success"
                                wire:click="type_bet('{{ $item->flag_code }}')">
                                {{ $item->name }}
                            </button>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                </div>
            </div>
        </div>

        {{-- Show content --}}
        @if ($type == 'bet_19_door_top' || $type == 'bet_19_door_bottom')
            @include('livewire.lottery-bet.bet_19_door')
        @endif

        @if ($type == 'three_top' || $type == 'three_bottom' || $type == 'three_tod')
            @include('livewire.lottery-bet.three_digit')
        @endif

        @if ($type == 'two_top' || $type == 'two_bottom')
            @include('livewire.lottery-bet.two_digit')
        @endif

        @if ($type == 'three_couple')
            @include('livewire.lottery-bet.three_couple')
        @endif

        @if ($type == 'three_couple_specail')
            @include('livewire.lottery-bet.three_couple_specail')
        @endif

        @if ($type == 'two_couple')
            @include('livewire.lottery-bet.two_couple')
        @endif

        @if ($type == 'run_top' || $type == 'run_bottom')
            @include('livewire.lottery-bet.run_number')
        @endif

    </div>
</div>
