
<div class="row">
    <div class="col-xl-12 col-md-12 mb-12">
        <div class="card shadow h-100 py-2">
            <div class="card-body">       

                <div class="row form-row no-gutters">
                    <div class="col-xl-6 col-md-6 mb-6 form-group">
                        <label for="three_top_baht">
                            {{ __('label.three_top_baht') }}
                        </label>
                        <input type="text" class="form-control @error('three_top_baht') is-invalid @enderror" id="three_top_baht" wire:model="three_top_baht">
                        @error('three_top_baht')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-xl-6 col-md-6 mb-6 form-group">
                        <label for="three_tod_baht">
                            {{ __('label.three_tod_baht') }}
                        </label>
                        <input type="text" class="form-control @error('three_tod_baht') is-invalid @enderror" id="three_tod_baht" wire:model="three_tod_baht">
                        @error('three_tod_baht')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row form-row no-gutters">
                    <div class="col-xl-6 col-md-6 mb-6 form-group">
                        <label for="three_bottom_baht">
                            {{ __('label.three_bottom_baht') }}
                        </label>
                        <input type="text" class="form-control @error('three_bottom_baht') is-invalid @enderror" id="three_bottom_baht" wire:model="three_bottom_baht">
                        @error('three_bottom_baht')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-xl-6 col-md-6 mb-6 form-group">
                        <label for="three_prefix_baht">
                            {{ __("label.three_prefix_baht") }}
                        </label>
                        <input type="text" class="form-control @error('three_prefix_baht') is-invalid @enderror" id="three_prefix_baht" wire:model="three_prefix_baht">
                        @error('three_prefix_baht')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row form-row no-gutters">
                    <div class="col-xl-6 col-md-6 mb-6 form-group">
                        <label for="two_top_baht">
                            {{ __('label.two_top_baht') }}
                        </label>
                        <input type="text" class="form-control @error('two_top_baht') is-invalid @enderror" id="two_top_baht" wire:model="two_top_baht">
                        @error('two_top_baht')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-xl-6 col-md-6 mb-6 form-group">
                        <label for="three_prefix_baht">
                            {{ __("label.two_bottom_baht") }}
                        </label>
                        <input type="text" class="form-control @error('two_bottom_baht') is-invalid @enderror" id="two_bottom_baht" wire:model="two_bottom_baht">
                        @error('two_bottom_baht')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row form-row no-gutters">
                    <div class="col-xl-6 col-md-6 mb-6 form-group">
                        <label for="run_top_baht">
                            {{ __('label.run_top_baht') }}
                        </label>
                        <input type="text" class="form-control @error('run_top_baht') is-invalid @enderror" id="run_top_baht" wire:model="run_top_baht">
                        @error('run_top_baht')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-xl-6 col-md-6 mb-6 form-group">
                        <label for="run_bottom_baht">
                            {{ __("label.run_bottom_baht") }}
                        </label>
                        <input type="text" class="form-control @error('run_bottom_baht') is-invalid @enderror" id="run_bottom_baht" wire:model="run_bottom_baht">
                        @error('run_bottom_baht')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>