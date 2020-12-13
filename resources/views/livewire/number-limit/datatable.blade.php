<div class="row">
    <div class="col-xl-12 col-md-12 mb-12">
        <table class="table">
            <thead>
                <tr>
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
                @foreach ($models as $item)
                    <tr>
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
    </div>
</div>
