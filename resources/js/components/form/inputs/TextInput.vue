<template>
    <div :class="defaultRowClass">
        <label :for="id" :class="defaultLabelClass">
            <slot></slot>
            <span v-if="required" :class="requiredClass">*</span>
        </label>
        <!-- TODO invalid input if has error -->
        <!-- TODO disabled type, min, max osv. -->
        <input :type="type ? type : 'text'"
               :pattern="pattern"
               :inputmode="inputMode"
               :autocomplete="autocomplete"
               :name="id"
               :id="id"
               v-model="inputVal"
               :class="defaultInputClass"
               :required="required"
               :aria-required="required"
               :aria-describedby="helper ? id+'-helper' : false"
               :autofocus="autofocus"
        >
        <small :id="id+'-helper'" :class="defaultHelperClass" v-text="helper"></small>
        <span :class="defaultErrorFeedback" role="alert" v-text="error"></span>
    </div>
</template>

<script>
    import formMixins from "../mixins/formMixins";

    export default {
        mixins: [formMixins]
    }
</script>
