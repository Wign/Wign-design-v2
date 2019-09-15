<template>
    <div :class=defaultRowClass>
        <label :for="id" :class=defaultLabelClass>
            <slot></slot>
            <span v-if="required" :class=requiredClass>*</span>
        </label>
        <select :id="id"
                :name="id"
                @change="updateInput($event.target.value)"
                :class="{defaultInputClass, 'is-invalid': has(this.error)}">
            <option v-for="option in options" :value="option.id" :selected="value.toString() === option.id.toString()">
                {{option.navn}}
            </option>
        </select>
        <span class="invalid-feedback" role="alert" v-text="this.error"></span>
    </div>
</template>

<script>
    import formMixins from "../mixins/formMixins";

    export default {
        mixins: [formMixins],
        methods: {
            updateInput(value) {
                this.$emit('input', value);
            }
        }
    }
</script>
