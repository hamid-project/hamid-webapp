<h4>{{ __('Personal Information') }}</h4>
<div class="row">
    <div class="col-sm">
        <div class="form-group">
            {{ Form::label('name_first', __('First Name')) }} *
            {{ Form::text('name_first', $person->name_first, ['class' => 'form-control', 'required' => true, 'autofocus' => true]) }}
        </div>
    </div>
    <div class="col-sm">
        <div class="form-group">
            {{ Form::label('name_middle', __('Middle Name')) }}
            {{ Form::text('name_middle', $person->name_middle, ['class' => 'form-control', 'required' => false]) }}
        </div>
    </div>
    <div class="col-sm">
        <div class="form-group">
            {{ Form::label('name_last', __('Last Name')) }} *
            {{ Form::text('name_last', $person->name_last, ['class' => 'form-control', 'required' => true]) }}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm">
        <div class="form-group">
            {{ Form::label('contact_email1', __('Email 1')) }} *
            {{ Form::email('contact_email1', $person->contact_email1, ['class' => 'form-control', 'required' => true]) }}
        </div>
    </div>
    <div class="col-sm">
        <div class="form-group">
            {{ Form::label('contact_email2', __('Email 2')) }}
            {{ Form::email('contact_email2', $person->contact_email2, ['class' => 'form-control', 'required' => false]) }}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm">
        <div class="form-group">
            {{ Form::label('contact_phone1', __('Phone 1')) }}
            {{ Form::tel('contact_phone1', $person->contact_phone1, ['class' => 'form-control', 'required' => false]) }}
        </div>
    </div>
    <div class="col-sm">
        <div class="form-group">
            {{ Form::label('contact_phone2', __('Phone 2')) }}
            {{ Form::tel('contact_phone2', $person->contact_phone2, ['class' => 'form-control', 'required' => false]) }}
        </div>
    </div>
</div>

