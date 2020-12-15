<br/>

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
                        {{ __('label.lottery_date') }}
                    </th>
                    <th>
                        {{ __('label.number_limit') }}
                    </th>
                    <th>
                        {{ __('label.payment_amount_percent') }}
                    </th>
                    <th>
                        {{ __('label.payment_amount_baht') }}
                    </th>
                    <th>
                        {{ __('Action') }}
                    </th>
                </tr>
            </thead>
            <tbody>

                @foreach ($items as $item)
                    <tr>
                        <td>
                            {{ $item->lottery_date }}
                        </td>
                        <td>
                            {{ $item->number_limit}}
                        </td>
                        <td>
                            {{ $item->payment_amount_percent}}
                        </td>
                        <td>
                            {{ $item->payment_amount_baht}}
                        </td>

                        <td>
                            <a href="#" class="btn btn-warning btn-circle btn-sm" wire:click="edit({{ $item->id }})">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-circle btn-sm" wire:click="delete({{ $item->id }})">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $items->links() }}

    </div>
</div>
