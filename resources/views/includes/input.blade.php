@php
/** @var string $name */
/** @var string $label */

$value = !empty($value) ? $value : old($name);
$type = !empty($type) ? $type : 'text';
@endphp

<div class="field">
    <label for="{{ $name }}" class="label">{{ $label }}</label>
    <div class="control">
        <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" class="input" value="{{ $value }}">
    </div>
    @component('components.error_field', ['fieldName' => $name]) @endcomponent
</div>
