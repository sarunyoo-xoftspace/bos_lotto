<div class="row">
    <div class="col-xl-12 col-md-12 mb-12">
        <div class="card shadow h-100 py-2">
            <div class="card-body">

                <div class="row form-row no-gutters">
                    <div class="col-xl-3 col-md-3 mb-3 form-group">
                        <label for="number_limit">
                            {{ __('label.number_limit') }}
                        </label>
                        <input type="text" class="form-control @error('number_limit') is-invalid @enderror" id="number_limit" wire:model="number_limit">
                        @error('number_limit')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-xl-3 col-md-3 mb-3 form-group">
                        <label for="payment_amount_percent">
                            {{ __('label.payment_amount_percent') }}
                        </label>
                        <input type="text" class="form-control @error('payment_amount_percent') is-invalid @enderror" id="payment_amount_percent" wire:model="payment_amount_percent">
                        @error('payment_amount_percent')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-xl-3 col-md-3 mb-3 form-group">
                        <label for="payment_amount_baht">
                            {{ __('label.payment_amount_baht') }}
                        </label>
                        <input type="text" class="form-control @error('payment_amount_baht') is-invalid @enderror" id="payment_amount_baht" wire:model="payment_amount_baht">
                        @error('payment_amount_baht')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-xl-3 col-md-3 mb-3 form-group">
                        <label for="payment_amount_baht">
                            {{ __('label.lottery_date') }}
                        </label>
                        <input type="text" class="form-control" value="{{ $batches->lottery_date }}" readonly />
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
