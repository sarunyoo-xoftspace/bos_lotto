<div class="row">
    <div class="col-xl-12 col-md-12 mb-12">
        <table class="table">
            <thead>
                <tr>
                    <th>
                        {{ __('label.three_top_baht') }}
                    </th>
                    <th>
                        {{ __('label.three_tod_baht') }}
                    </th>
                    <th>
                        {{ __('label.three_bottom_baht') }}
                    </th>
                    <th>
                        {{ __('label.three_prefix_baht') }}
                    </th>
                    <th>
                        {{ __('label.two_top_baht') }}
                    </th>
                    <th>
                        {{ __('label.two_bottom_baht') }}
                    </th>
                    <th>
                        {{ __('label.run_top_baht') }}
                    </th>
                    <th>
                        {{ __('label.run_bottom_baht') }}
                    </th>
                    <th>
                        {{ __('Action') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($priceSetups as $item)
                    <tr>
                        <td>
                            {{ $item->three_top_baht }}
                        </td>
                        <td>
                            {{ $item->three_tod_baht }}
                        </td>
                        <td>
                            {{ $item->three_bottom_baht }}
                        </td>
                        <td>
                            {{ $item->three_prefix_baht }}
                        </td>
                        <td>
                            {{ $item->two_top_baht }}
                        </td>
                        <td>
                            {{ $item->two_bottom_baht }}
                        </td>
                        <td>
                            {{ $item->run_top_baht }}
                        </td>
                        <td>
                            {{ $item->run_bottom_baht }}
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
