<template>
    <div class="form-group row">
        <label :for="id" class="col-sm-4 col-form-label text-md-right"><slot></slot> <span v-if="required" class="text-danger">*</span></label>
        <div class="col-md-6">
            <textarea :id="id" :name="id" class="form-control" :class="{'is-invalid': has(this.error)}" rows="3" v-model="inputVal" :required="required"></textarea>
            <span class="invalid-feedback" role="alert" v-text="this.error"></span>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['value', 'id', 'error', 'required', 'autocomplete'],
        computed: {
            inputVal: {
                get() {
                    return this.value;
                },
                set(value) {
                    this.$emit('input', value);
                }
            }
        }
    }
</script>
