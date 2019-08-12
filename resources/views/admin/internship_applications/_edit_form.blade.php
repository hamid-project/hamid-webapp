@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
    {{ Form::label('internship_id', __('Internship')) }} *
    {{ Form::select('internship_id', \App\Internship::getHashForSelectForm(), $internshipApplication->internship_id, ['class' => 'c-select form-control boxed', 'placeholder' => 'Select Internship.']) }}
</div>

<div class="form-group">
    {{ Form::label('student_id', __('Student')) }} *
    {{ Form::select('student_id', \App\Student::getHashForSelectForm(), $internshipApplication->student_id, ['class' => 'c-select form-control boxed', 'placeholder' => 'Select Student.']) }}
</div>

<div class="form-group">
    {{ Form::label('status_code_outcome_code', __('Status')) }} *
    {{ Form::select('status_code_outcome_code', \App\InternshipApplication::getStatusOutcomeHashForSelectForm(), $internshipApplication->status_code_outcome_code, ['class' => 'c-select form-control boxed']) }}
</div>

<div class="form-group">
    {{ Form::label('description', __('Notes')) }}
    {{ Form::textarea('description', $internshipApplication->note, ['class' => 'form-control', 'rows' => 10]) }}
</div>
