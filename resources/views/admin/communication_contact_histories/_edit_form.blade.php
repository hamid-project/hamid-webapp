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
            {{ Form::select('admin_id', \App\Admin::getHashForSelectForm(), $communicationContactHistory->admin_id, ['class' => 'c-select form-control boxed', 'placeholder' => 'Select Admin.']) }}
        </div>
    </div>

    <div class="col-sm">
        <div class="form-group">
            {{ Form::label('company_staff_id', __('Company Staff')) }} *
            {{ Form::select('company_staff_id', \App\CompanyStaff::getHashForSelectForm(), $communicationContactHistory->company_staff_id, ['class' => 'c-select form-control boxed', 'placeholder' => 'Select Company Staff.']) }}
        </div>
    </div>
</div>

<div class="form-group">
    {{ Form::label('sent_on', __('Sent On')) }} *
    {{ Form::date('sent_on', $communicationContactHistory->sent_on, ['class' => 'form-control', 'required' => true]) }}
</div>

<div class="form-group">
    {{ Form::label('method', __('Method')) }} *
    {{ Form::select('method', \App\CommunicationContactHistory::getMethodHashForSelectForm(), $communicationContactHistory->method_label_code, ['class' => 'c-select form-control boxed', 'placeholder' => 'Select Method.']) }}
</div>

<div class="form-group">
    {{ Form::label('code', __('Notes *')) }}
    {{ Form::textarea('notes', $communicationContactHistory->notes, ['class' => 'form-control', 'rows' => 10, 'required' => true]) }}
</div>
