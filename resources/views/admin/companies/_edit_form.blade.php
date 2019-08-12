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
    {{ Form::label('name', __('Company Name')) }} *
    {{ Form::text('name', $company->name, ['class' => 'form-control', 'required' => true, 'autofocus' => true]) }}
</div>

<div class="form-group">
    {{ Form::label('address', __('Address')) }}
    {{ Form::text('address', $company->address, ['class' => 'form-control', 'required' => false]) }}
</div>

<div class="form-group">
    {{ Form::label('website', __('Website')) }}
    {{ Form::text('website', $company->website, ['class' => 'form-control', 'required' => false]) }}
</div>
