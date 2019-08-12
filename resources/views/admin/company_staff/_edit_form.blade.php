@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@component('components.admin.form.personal_information')
    @slot('person', $companyStaff)
@endcomponent

<h4>{{ __('Company Information') }}</h4>

<div class="row">
    <div class="col-sm">
        <div class="form-group">
            {{ Form::label('company_id', __('Company')) }} *
	    {{ Form::select('company_id', \App\Company::getHashForSelectForm(), $companyStaff->company_id, ['class' => 'c-select form-control boxed', 'placeholder' => 'Select Company.']) }}
        </div>
    </div>
    <div class="col-sm">
        <div class="form-group">
            {{ Form::label('department', __('Department')) }} *
	    {{ Form::tel('department', $companyStaff->department, ['class' => 'form-control', 'required' => true]) }}
        </div>
    </div>
</div>

<div class="form-group">
    {{ Form::label('address', __('Address')) }} *
    {{ Form::tel('address', $companyStaff->address, ['class' => 'form-control', 'required' => true]) }}
</div>

<div class="form-group">
    {{ Form::label('website', __('Website')) }} *
    {{ Form::tel('website', $companyStaff->website, ['class' => 'form-control', 'required' => true]) }}
</div>

<h4>{{ __('Contact Information') }}</h4>

<div class="form-check">
    {{ Form::checkbox('acceptance_corporate_gift', 'on', $companyStaff->acceptance_corporate_gift, ['id' => 'acceptance_corporate_gift', 'class' => 'form-check-input']) }}
    {{ Form::label('acceptance_corporate_gift', __('Acceptance Corporate Gift')) }}
</div>

<div class="form-check">
    {{ Form::checkbox('acceptance_internship', 'on', $companyStaff->acceptance_internship, ['id' => 'acceptance_internship', 'class' => 'form-check-input']) }}
    {{ Form::label('acceptance_internship', __('Acceptance Internship')) }}
</div>
