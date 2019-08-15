@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@component('components.student.form.personal_information')
    @slot('person', $student)
@endcomponent

<h4>{{ __('Enrollment Information') }}</h4>

<div class="form-group">
    {{ Form::label('code', __('Student ID *')) }}
    {{ Form::text('code', $student->code, ['class' => 'form-control', 'required' => true]) }}
</div>
<div class="row">
    <div class="col-sm">
        <div class="form-group">
            {{ Form::label('programme_code', __('Programme')) }}
            {{ Form::select('programme_code', \App\Student::getProgrammeHashForSelectForm(), $student->programme_code, ['class' => 'c-select form-control boxed']) }}
        </div>
    </div>
    <div class="col-sm">
        <div class="form-group">
            {{ Form::label('specialisation_code', __('Specialisation')) }}
            {{ Form::select('specialisation_code', \App\Student::getSpecialisationHashForSelectForm(), $student->specialisation_code, ['class' => 'c-select form-control boxed']) }}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm">
        <div class="form-group">
            {{ Form::label('enrollment_start_code', __('Enrollment Start')) }}
            {{ Form::select('enrollment_start_code', \App\Student::getSemesterHashForSelectForm(), $student->enrollment_start_code, ['class' => 'c-select form-control boxed']) }}
        </div>
    </div>
    <div class="col-sm">
        <div class="form-group">
            {{ Form::label('enrollment_finish_code', __('Enrollment Finish')) }}
            {{ Form::select('enrollment_finish_code', \App\Student::getSemesterHashForSelectForm(), $student->enrollment_finish_code, ['class' => 'c-select form-control boxed']) }}
        </div>
    </div>
</div>

<h4>{{ __('File Attachment') }}</h4>
<div class="row">
    <div class="col-sm">
        <div class="form-group">
            {{ Form::file('file', ['class' => 'form-control-file']) }}
        </div>
    </div>
</div>

<h4>{{ __('Potential Preference') }}</h4>

<div class="row">
    <div class="col-sm">
        <div class="form-group">
            <div class="form-group">
                {{ Form::label('area_codes', __('Areas')) }}
                {{ Form::select('area_codes[]', \App\Student::getAreaHashForSelectForm(), $student->potential_area_codes, ['class' => 'c-select form-control boxed', 'multiple' => True]) }}
            </div>
        </div>
    </div>

    <div class="col-sm">
        <div class="form-group">
            <div class="form-group">
                {{ Form::label('specialiastion_codes', __('Specialisations')) }}
                {{ Form::select('specialisation_codes[]', \App\Student::getSpecialisationHashForSelectForm(), $student->potential_specialisation_codes, ['class' => 'c-select form-control boxed', 'multiple' => True]) }}
            </div>
        </div>
    </div>

    <div class="col-sm">
        <div class="form-group">
            <div class="form-group">
                {{ Form::label('transportation_codes', __('Transportations')) }}
                {{ Form::select('transportation_codes[]', \App\Student::getTransportationHashForSelectForm(), $student->potential_transportation_codes, ['class' => 'c-select form-control boxed', 'multiple' => True]) }}
            </div>
        </div>
    </div>
</div>
