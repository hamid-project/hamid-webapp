@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
    <div class="col-sm">
        <div class="form-group">
            {{ Form::label('admin_id', __('Admin')) }} *
            {{ Form::select('admin_id', \App\Admin::getHashForSelectForm(), $communicationGiftHistory->admin_id, ['class' => 'c-select form-control boxed', 'placeholder' => 'Select Admin.']) }}
        </div>
    </div>

    <div class="col-sm">
        <div class="form-group">
            {{ Form::label('company_staff_id', __('Company Staff')) }} *
            {{ Form::select('company_staff_id', \App\CompanyStaff::getHashForSelectForm(), $communicationGiftHistory->company_staff_id, ['class' => 'c-select form-control boxed', 'placeholder' => 'Select Company Staff.']) }}
        </div>
    </div>
</div>

<div class="form-group">
    {{ Form::label('sent_on', __('Sent On')) }} *
    {{ Form::date('sent_on', $communicationGiftHistory->sent_on, ['class' => 'form-control', 'required' => true]) }}
</div>

<div class="form-group">
    {{ Form::label('code', __('Notes *')) }}
    {{ Form::textarea('notes', $communicationGiftHistory->notes, ['class' => 'form-control', 'rows' => 10, 'required' => true]) }}
</div>
