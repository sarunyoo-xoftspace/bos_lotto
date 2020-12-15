<div>
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-12">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-right">

                        <div class="col-xl-6 col-md-6 mb-6">
                            <h1 class="h3 mb-0 text-gray-800">
                                {{ __('label.lottery_rewards') }}
                            </h1>
                            <small>
                            {{ __('กรณี รองรับหวยรัฐบาลไทย') }}
                            </small>
                        </div>

                        <div class="col-xl-6 col-md-6 mb-6 text-right">
                            <a href="javascript:void(0)" class="btn btn-primary btn-circle btn-lg" wire:click="update">
                                <i class="fas fa-save"></i>
                            </a>
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

                    <div class="row form-row no-gutters">
                        <div class="col-xl-4 col-md-4 mb-4 form-group">
                        </div>
                        <div class="col-xl-4 col-md-4 mb-4 form-group">
                            <input type="text" class="form-control" value="{{ $lottery_date }}" readonly/>
                        </div>
                        <div class="col-xl-4 col-md-4 mb-4 form-group">
                        </div>
                    </div>

                    <input type="hidden" class="form-control" value="{{ $lottery_reward_id }}"/>

                    <div class="row form-row no-gutters">
                        <div class="col-xl-4 col-md-4 mb-4 form-group">
                            <label for="first_prize">
                                {{ __('label.first_prize') }}
                            </label>
                            <input type="text" class="form-control @error('first_prize') is-invalid @enderror" id="first_prize" wire:model="first_prize">
                            @error('first_prize')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-xl-2 col-md-2 mb-2 form-group">
                            <label for="three_digit_prefix_1">
                                {{ __('label.three_digit_prefix_1') }}
                            </label>
                            <input type="text" class="form-control @error('three_digit_prefix_1') is-invalid @enderror" id="three_digit_prefix_1" wire:model="three_digit_prefix_1">
                            @error('three_digit_prefix_1')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-xl-2 col-md-2 mb-2 form-group">
                            <label for="three_digit_prefix_2">
                                {{ __('label.three_digit_prefix_2') }}
                            </label>
                            <input type="text" class="form-control @error('three_digit_prefix_2') is-invalid @enderror" id="three_digit_prefix_2" wire:model="three_digit_prefix_2">
                            @error('three_digit_prefix_2')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-xl-2 col-md-2 mb-2 form-group">
                            <label for="three_digit_suffix_1">
                                {{ __('label.three_digit_suffix_1') }}
                            </label>
                            <input type="text" class="form-control @error('three_digit_suffix_1') is-invalid @enderror" id="three_digit_suffix_1" wire:model="three_digit_suffix_1">
                            @error('three_digit_suffix_1')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-xl-2 col-md-2 mb-2 form-group">
                            <label for="three_digit_suffix_2">
                                {{ __('label.three_digit_suffix_2') }}
                            </label>
                            <input type="text" class="form-control @error('three_digit_suffix_2') is-invalid @enderror" id="three_digit_suffix_2" wire:model="three_digit_suffix_2">
                            @error('three_digit_suffix_2')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-row no-gutters">
                        <div class="col-xl-4 col-md-4 mb-4 form-group">
                            <label for="two_digit_suffix">
                                {{ __('label.two_digit_suffix') }}
                            </label>
                            <input type="text" class="form-control @error('two_digit_suffix') is-invalid @enderror" id="two_digit_suffix" wire:model="two_digit_suffix">
                            @error('two_digit_suffix')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


</div>
