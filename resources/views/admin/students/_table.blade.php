    <div class="table-responsive">
        <table class="table table-sm table-striped">
            <thead>
                <tr>
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('Student ID') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>
                        {{ __('Email 1') }}
                        /
                        {{ __('Phone 1') }}
                    </th>
                    <th>{{ __('Period') }}</th>
                    <th>
                        {{ __('Programme') }}
                        /
                        {{ __('Specialisation') }}
                    </th>
                    <th>{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td><a href="{{ route('admin.students.show', $student->id) }}">{{ $student->id }}</a></td>
                        <td>{{ $student->code }}</td>
                        <td>{{ $student->name }}</td>
                        <td>
                            <a href="mailto:{{ $student->contact_email1 }}">{{ $student->contact_email1 }}</a><br />
                            <a href="tel:{{ $student->contact_phone1 }}">{{ $student->contact_phone1 }}</a>
                        </td>
                        <td>{{ $student->formatted_enrollment_period }}</td>
                        <td>
                            <span title="{{ $student->programme->name }}">{{ $student->programme->code }}</span>
                            /
                            <span title="{{ $student->specialisation->name }}">{{ $student->specialisation->code }}</span>
                        </td>
                        <td>
                            <a href="{{ route('admin.students.edit', ['id' => $student->id]) }}" class="btn btn-primary">{{ __('Edit') }}</a>
                            &nbsp;
                            @component('components.button-delete')
                                @slot('route', 'admin.students.destroy')
                                @slot('id', $student->id)
                            @endcomponent
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
