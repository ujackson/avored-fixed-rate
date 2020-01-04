<template>
    <div>
        <a-form-item label="Status">
            <a-select @change="statusChange" :default-value="data.express_delivery_enabled">
                <a-select-option value="true">Enabled</a-select-option>
                <a-select-option value="false">Disabled</a-select-option>
            </a-select>
        </a-form-item>
        <input type="hidden" name="express_delivery_enabled" v-model="status" />
    </div>
</template>

<script>

    export default {
        name: 'fixed-rate-config',
        props: ['data'],
        data () {
            return {
                status: false
            }
        },
        methods: {
            statusChange(val) {
                this.status = val
            }
        },
        mounted() {
        }
    }
</script>
