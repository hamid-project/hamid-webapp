@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h4>{{ __('Internship Information') }}</h4>
<div class="form-group">
    {{ Form::label('name', __('Name *')) }}
    {{ Form::text('name', $internship->name, ['class' => 'form-control', 'required' => true]) }}
</div>

<div class="form-group">
    {{ Form::label('position', __('Position')) }} *
    {{ Form::text('position', $internship->position, ['class' => 'form-control', 'required' => true]) }}
</div>

<div class="form-group">
    {{ Form::label('description', __('Description')) }} *
    {{ Form::textarea('description', $internship->description, ['class' => 'form-control', 'rows' => 10]) }}
</div>

<div class="row">
    <div class="col-sm">
        <div class="form-group">
            {{ Form::label('company_staff_id', __('Company Staff')) }} *
            {{ Form::select('company_staff_id', \App\CompanyStaff::getHashForSelectForm(), $internship->company_staff_id, ['class' => 'c-select form-control boxed', 'placeholder' => 'Select Company Staff.']) }}
        </div>
    </div>
    <div class="col-sm">
        <div class="form-group">
            {{ Form::label('number_of_interns', __('The number of interns')) }} *
            {{ Form::number('number_of_interns', $internship->number_of_interns, ['class' => 'form-control', 'required' => true]) }}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm">
        <div class="form-group">
            {{ Form::label('internship_begin', __('Begin Internship')) }}
            {{ Form::date('internship_begin', $internship->internship_begin, ['class' => 'form-control', 'required' => false]) }}
        </div>
    </div>
    <div class="col-sm">
        <div class="form-group">
            {{ Form::label('internship_end', __('End Internship')) }}
            {{ Form::date('internship_end', $internship->internship_end, ['class' => 'form-control', 'required' => false]) }}
        </div>
    </div>
    <div class="col-sm">
        <div class="form-group">
            {{ Form::label('status', __('Status')) }}
            {{ Form::select('status', ['1' => 'Open', '2' => 'Closed'], $internship->status, ['class' => 'c-select form-control boxed', 'placeholder' => 'Select Status.']) }}
        </div>
    </div>
</div>

<div class="form-group">
    {{ Form::label('supervisor_id', __('Supervisor')) }} *
    {{ Form::select('supervisor_id', \App\Supervisor::getHashForSelectForm(), $internship->supervisor_id, ['class' => 'c-select form-control boxed', 'placeholder' => 'Select Supervisor.']) }}
</div>

<h4>{{ __('Potential Preference') }}</h4>

<div class="row">
    <div class="col-sm">
        <div class="form-group">
            <div class="form-group">
                {{ Form::label('area_codes', __('Areas')) }} *
                {{ Form::select('area_codes[]', \App\Internship::getAreaHashForSelectForm(), $internship->potential_area_codes, ['class' => 'c-select form-control boxed', 'multiple' => True]) }}
            </div>
        </div>
    </div>

    <div class="col-sm">
        <div class="form-group">
            <div class="form-group">
                {{ Form::label('specialiastion_codes', __('Specialisations')) }} *
                {{ Form::select('specialisation_codes[]', \App\Internship::getSpecialisationHashForSelectForm(), $internship->potential_specialisation_codes, ['class' => 'c-select form-control boxed', 'multiple' => True]) }}
            </div>
        </div>
    </div>

    <div class="col-sm">
        <div class="form-group">
            <div class="form-group">
                {{ Form::label('transportation_codes', __('Transportations')) }}
                {{ Form::select('transportation_codes[]', \App\Internship::getTransportationHashForSelectForm(), $internship->potential_transportation_codes, ['class' => 'c-select form-control boxed', 'multiple' => True]) }}
            </div>
        </div>
    </div>
</div>

