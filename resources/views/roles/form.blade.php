<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label for="name">{{__('commons.name')}}</label>
            <input class="form-control" name="name" type="text" id="name"
                value="{{ old('name', optional($role)->name) }}" minlength="1" maxlength="191" required>
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group {{ $errors->has('display_name') ? 'has-error' : '' }}">
            <label for="display_name">{{__('adminPrivilege.display_name')}}</label>
            <input class="form-control" name="display_name" type="text" id="display_name"
                value="{{ old('display_name', optional($role)->display_name) }}" maxlength="191">
            {!! $errors->first('display_name', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
            <label for="description">{{__('commons.description')}}</label>
            <input class="form-control" name="description" type="text" id="description"
                value="{{ old('description', optional($role)->description) }}" maxlength="191">
            {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

