    <div class="table-responsive">
        <table class="table table-sm table-striped">
            <thead>
                <tr>
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('Admin') }}</th>
                    <th>{{ __('Company Staff') }}</th>
                    <th>{{ __('Sent on') }}</th>
                    <th>{{ __('Notes') }}</th>
                    <th>{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($communicationGiftHistories as $giftHistory)
                    <tr>
                        <td><a href="{{ route('admin.communicationGiftHistories.show', $giftHistory->id) }}">{{ $giftHistory->id }}</a></td>
                        <td>{{ $giftHistory->admin->name }}</td>
                        <td>
                            <a href="{{ route('admin.companyStaff.show', ['id' =>  $giftHistory->companyStaff->id]) }}">{{ $giftHistory->companyStaff->name }}</a>
                            <br />
                            (<a href="{{ route('admin.companies.show', ['id' =>  $giftHistory->companyStaff->company->id]) }}">{{ $giftHistory->companyStaff->company->name }}</a>)
                        </td>
                        <td>{{ $giftHistory->sent_on }}</td>
                        <td>{{ str_limit($giftHistory->notes, 50, '...') }}</td>
                        <td>
                            <a href="{{ route('admin.communicationGiftHistories.edit', ['id' => $giftHistory->id]) }}" class="btn btn-primary">{{ __('Edit') }}</a>
                            &nbsp;
                            @component('components.button-delete')
                                @slot('route', 'admin.communicationGiftHistories.destroy')
                                @slot('id', $giftHistory->id)
                            @endcomponent
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
