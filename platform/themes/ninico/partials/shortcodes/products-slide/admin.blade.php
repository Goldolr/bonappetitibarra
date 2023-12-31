<div class="form-group">
    <label class="control-label">{{ __('Title') }}</label>
    <input type="text" name="title" value="{{ Arr::get($attributes, 'title') }}" class="form-control" placeholder="{{ __('Title') }}">
</div>

<div class="form-group">
    <label class="control-label">{{ __('Limit') }}</label>
    <input type="number" name="limit" value="{{ Arr::get($attributes, 'limit') }}" class="form-control" placeholder="{{ __('Number of products to display') }}">
</div>

<div class="form-group">
    <label class="control-label">{{ __('Type') }}</label>
    {{ Form::customSelect('type', $types, Arr::get($attributes, 'type')) }}
</div>
