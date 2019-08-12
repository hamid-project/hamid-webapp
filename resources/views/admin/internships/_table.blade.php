    <div class="table-responsive">
        <table class="table table-sm table-striped">
            <thead>
                <tr>
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Position') }}</th>
                    <th>{{ __('Period') }}</th>
                    <th>{{ __('Supervisor') }}</th>
                    <th>{{ __('Company Staff') }}</th>
                    <th>{{ __('Status') }}</th>
                    <th>{{ __('Interns') }}</th>
                    <th>{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($internships as $internship)
                <tr>
                    <td><a href="{{ route('admin.internships.show', $internship->id) }}">{{ $internship->id }}</a></td>
                    <td>{{ $internship->name }}</td>
                    <td>{{ $internship->position }}</td>
                    <td>{{ $internship->formatted_internship_period }}</td>
                    <td>
                        <a href="{{ route('admin.supervisors.show', ['id' => $internship->supervisor->id]) }}">{{ $internship->supervisor->name }}</a>
                    </td>
                    <td>
                        <a href="{{ route('admin.companyStaff.show', ['id' => $internship->companyStaff->id]) }}">{{ $internship->companyStaff->name }}</a>
                        (<a href="{{ route('admin.companies.show', ['id' => $internship->companyStaff->company->id]) }}">{{ $internship->companyStaff->company->name }}</a>)
                    </td>
                    <td>{{ $internship->formatted_status }}</td>
                    <td>
                        <a href="{{ route('admin.internshipApplications.index') }}?internship_id={{ $internship->id }}">
                          <span title="Total request of interns">{{ $internship->number_of_interns }}</span>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('admin.internships.edit', ['id' => $internship->id]) }}" class="btn btn-primary">{{ __('Edit') }}</a>
                        &nbsp;
                        @component('components.button-delete')
                            @slot('route', 'admin.internships.destroy')
                            @slot('id', $internship->id)
                        @endcomponent
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
