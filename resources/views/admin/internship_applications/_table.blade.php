    <div class="table-responsive">
        <table class="table table-sm table-striped">
            <thead>
                <tr>
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('Internship Name') }}</th>
                    <th>{{ __('Student Name') }}</th>
                    <th>{{ __('Period') }}</th>
                    <th>{{ __('Status') }}</th>
                    <th>{{ __('Outcome') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($internshipApplications as $internshipApplication)
                    <tr>
                        <td>
                            <a href="{{ route('admin.internshipApplications.show', $internshipApplication->id) }}">{{ $internshipApplication->id }}</a>
                        </td>
                        <td>
                            <a href="{{ route('admin.internships.show', ['id' => $internshipApplication->internship->id]) }}">{{ $internshipApplication->internship->name }}</a>
                        </td>
                        <td>
                            <a href="{{ route('admin.students.show', ['id' => $internshipApplication->student->id]) }}">{{ $internshipApplication->student->name }}</a>
                        </td>
                        <td>{{ $internshipApplication->internship->formatted_internship_period }}</td>
                        <td>{{ $internshipApplication->status->name }}</td>
                        <td>{{ $internshipApplication->outcome->name }}</td>
                        <td>
                            <a href="{{ route('admin.internshipApplications.edit', ['id' => $internshipApplication->id]) }}" class="btn btn-primary">{{ __('Edit') }}</a>
                            &nbsp;
                            @component('components.button-delete')
                                @slot('route', 'admin.internshipApplications.destroy')
                                @slot('id', $internshipApplication->id)
                            @endcomponent
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
