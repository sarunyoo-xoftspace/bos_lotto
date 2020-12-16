<div class="row ">
    <div class="col-xl-12 col-md-12 mb-12 form-group">
        <p>
            <strong>
                19 ประเภท
            </strong>
            <hr/>
        </p>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-md-12 mb-12 form-group">
        <input type="text" class="form-control @error('numberDoorInput') is-invalid @enderror" wire:model="numberDoorInput" placeholder="กรอกตัวเลข 1 ตัว" maxlength="1"/>
        @error('numberDoorInput')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col-xl-6 col-md-6 mb-6 form-group">
        <button type="button" class="btn btn-block btn-outline-success" wire:click="roodFront">
            {{ __('รูดหน้า') }}
        </button>
    </div>
    <div class="col-xl-6 col-md-6 mb-6 form-group">
        <button type="button" class="btn btn-block btn-outline-success" wire:click="roodBack">
            {{ __('รูดหลัง') }}
        </button>
    </div>
</div>
