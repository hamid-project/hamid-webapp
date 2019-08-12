    <div class="table-responsive">
        <table class="table table-sm table-striped">
            <thead>
                <tr>
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('Admin') }}</th>
                    <th>{{ __('Company Staff') }}</th>
                    <th>{{ __('Sent on') }}</th>
                    <th>{{ __('Method') }}</th>
                    <th>{{ __('Notes') }}</th>
                    <th>{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($communicationContactHistories as $contactHistory)
                    <tr>
                        <td><a href="{{ route('admin.communicationContactHistories.show', $contactHistory->id) }}">{{ $contactHistory->id }}</a></td>
                        <td>{{ $contactHistory->admin->name }}</td>
                        <td>
                            <a href="{{ route('admin.companyStaff.show', ['id' =>  $contactHistory->companyStaff->id]) }}">{{ $contactHistory->companyStaff->name }}</a>
                            <br />
                            (<a href="{{ route('admin.companies.show', ['id' =>  $contactHistory->companyStaff->company->id]) }}">{{ $contactHistory->companyStaff->company->name }}</a>)
                        </td>
                        <td>{{ $contactHistory->formatted_sent_on }}</td>
                        <td>{{ $contactHistory->method_code }}</td>
                        <td>{{ str_limit($contactHistory->notes, 50, '...') }}</td>
                        <td>
                            <a href="{{ route('admin.communicationContactHistories.edit', ['id' => $contactHistory->id]) }}" class="btn btn-primary">{{ __('Edit') }}</a>
                            &nbsp;
                            @component('components.button-delete')
                                @slot('route', 'admin.communicationContactHistories.destroy')
                                @slot('id', $contactHistory->id)
                            @endcomponent
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
