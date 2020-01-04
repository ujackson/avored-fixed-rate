@php
    $data = collect();
    $data->put('express_delivery_enabled', $repository->getValueByCode('express_delivery_enabled'));
@endphp

<fixed-rate-config :data="{{ $data }}"></fixed-rate-config>

<a-form-item
    @if ($errors->has('express_delivery_cost'))
    validate-status="error"
    help="{{ $errors->first('express_delivery_cost') }}"
    @endif
    label="Express Delivery Cost">
    <a-input
        :auto-focus="true"
        name="express_delivery_cost"
        v-decorator="[
        'express_delivery_cost',
        {initialValue: '{{ ($repository->getValueByCode('express_delivery_cost')) ?? '' }}'},
        {rules:
            [
                {   required: true,
                    message: 'Please enter express delivery cost'
                }
            ]
        }
        ]"
    ></a-input>
</a-form-item>

@push('scripts')
    <script src="{{ asset('avored-admin/js/fixed-rate.js') }}"></script>
@endpush
