<div class="card shadow mb-4">
    <div
        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">
            {{ __("รายการแทงหวย") }}
        </h6>
    </div>
    <div class="card-body">

        <div class="row border-bottom-success">
            <div class="col-md-6">
                <strong>ชื่อ</strong> {{ $bet_customer }}
            </div>
            <div class="col-md-6">
                <strong>เบอร์</strong> {{ $bet_mobile }}
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                input
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <button type="button" class="btn btn-block btn-outline-primary">
                    {{ __('ส่งโพยแทงหวย')}}
                </button>
            </div>
            <div class="col-md-2">
            </div>
        </div>


    </div>


</div>
