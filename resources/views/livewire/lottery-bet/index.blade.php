<div class="card shadow mb-4">

    <div
        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">
            {{ __('เริ่มการแทงหวย / ซื้อรางวัล')}}
        </h6>
        <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="javascript:void(0)" role="button" id="dropdownMenuLink"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
        </div>
    </div>

    <div class="card-body">

        <div class="row">
            <div class="col-xl-5 col-md-5 mb-6 form-group">
                <label for="customer_name">
                    {{ __('label.customer_name') }}
                </label>
                <input type="text" class="form-control @error('customer_name') is-invalid @enderror" id="customer_name" wire:model="customer_name">
                @error('customer_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-xl-4 col-md-4 mb-6 form-group">
                <label for="mobile">
                    {{ __('label.mobile') }}
                </label>
                <input type="text" class="form-control @error('mobile') is-invalid @enderror" id="mobile" wire:model="mobile">
                @error('mobile')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-xl-3 col-md-3 mb-6 form-group">
                <label for="btn-lotter-bet">
                </label>
                <a href="javascript:void(0)" class="btn btn-success btn-icon-split" id="btn-lotter-bet">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">
                        {{ __('เริ่มการแทง')}}
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
