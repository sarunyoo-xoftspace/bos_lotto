<div>
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-12">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-right">

                        <div class="col-xl-6 col-md-6 mb-6">
                            <h1 class="h3 mb-0 text-gray-800">
                                {{ __('ตรวจสอบโพย') }}
                            </h1>
                            <small>
                            {{ __('กรณี รองรับหวยรัฐบาลไทย') }}
                            </small>
                        </div>

                        <div class="col-xl-6 col-md-6 mb-6 text-right">
                            @if($isShowDetail)
                                <a href="{{ route('list-cheat')}}" class="btn btn-secondary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-arrow-left"></i>
                                    </span>
                                    <span class="text">กลับ</span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/>

    @if($isShowDetail)
    
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
                        <strong>ชื่อ</strong><span class="text-primary" style="padding-left: 5px;">{{ $bet_customer }}</span>
                    </div>
                    <div class="col-md-6">
                        <strong>เบอร์</strong><span class="text-primary" style="padding-left: 5px;">{{ $bet_mobile }}</span>
                    </div>
                </div>
            
                <br>
                
                <div class="row">
                    <div class="col-md-3 text-center">
                        <strong>
                            ลำดับ
                        </strong>
                    </div>
                    <div class="col-md-3 text-center">
                        <strong>
                            เลขโพย
                        </strong>
                    </div>
                    <div class="col-md-3 text-center">
                        <strong>
                            เงิน(บาท)
                        </strong>
                    </div>
                    <div class="col-md-3 text-center">
                        <strong>
                            ประเภทหวย
                        </strong>
                    </div>
                </div>
        
                @php 
                    $index = 1;
                    $summary_bet_amount =  0;
                @endphp

                @foreach ($bet_details as $item)
                    <div class="row">
                        <div class="col-md-3 text-center">
                            {{ $index }}
                        </div>
                        <div class="col-md-3 text-center">
                            <strong>
                                {{ $item->bet_number }}
                            </strong>
                        </div>
                        <div class="col-md-3 text-center">
                            <strong>
                                {{ number_format($item->bet_amount,2) }}
                            </strong>
                        </div>
                        <div class="col-md-3 text-center">
                            <strong>
                                {{ $item->bet_type_name }}
                            </strong>
                        </div>
                    </div>
                    @php 
                        $index++;
                        $summary_bet_amount += $item->bet_amount;
                    @endphp 
                @endforeach
                <div class="row border-bottom-success">
                    <div class="col-md-12 text-center">
                    </div>
                </div>
                <div class="row border-bottom-success">
                    <div class="col-md-3 text-center">
                    </div>
                    <div class="col-md-3 text-center">
                        <strong>
                            รวมเงินทั้งหมด
                        </strong>
                    </div>
                    <div class="col-md-3 text-center">
                        <strong>
                            {{ number_format($summary_bet_amount,2) }}

                            &nbsp;
                            บาท
                        </strong>
                    </div>
                    <div class="col-md-3 text-center">
                    </div>
                </div>
            </div>
        </div>

    @else
    
        <div class='row'>
            <div class="col-xl-12 col-md-12 mb-12 input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">
                        {{ __('label.btn_search') }}
                    </span>
                </div>
                <input type="text" wire:model="search" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-md-12 mb-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                {{ __('label.customer_name') }}
                            </th>
                            <th>
                                {{ __('label.mobile') }}
                            </th>
                            <th>
                                รวมเงินทั้งหมด
                            </th>
                            <th>
                                
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($items as $item)
                            <tr>
                                <td>
                                    {{ $item->bet_customer_name }}
                                </td>
                                <td>
                                    @empty($item->bet_customer_mobile)
                                        {{ __('ไม่ได้ระบุ')}}
                                    @endempty
                                    {{ $item->bet_customer_mobile }}
                                </td>
                                <td>
                                    {{ number_format($item->sum_bet_amount, 2) }}
                                </td>
                                <td>
                                    <a href="javascript:void(0)" class="btn btn-info btn-circle" wire:click="showDetail('{{$item->bet_customer_name}}','{{$item->bet_customer_mobile}}')">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                    {{--
                                    <a href="javascript:void(0)" class="btn btn-primary btn-circle" wire:click="showDetail('{{$item->bet_customer_name}}','{{$item->bet_customer_mobile}}')">
                                        <i class="fas fa-print"></i>
                                    </a>
                                    --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $items->links() }}

            </div>
        </div> 
    @endif
</div>
