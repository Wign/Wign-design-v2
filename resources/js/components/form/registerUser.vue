<template>

    <form method="post" id="registerUser" :class=defaultFormClass @submit.prevent="registerUser" @keydown="form.errors.clear($event.target.name)">
        <div v-if="form.errors.message" class="alert alert-danger" role="alert" v-text="form.errors.message"></div>
        <div v-if="success" class="alert" :class="successType" role="status" v-text="success"></div>

        <text-input id="first-name" v-model="form.firstName" :error="form.errors.get('firstName')" :required=true :autofocus=true>{{ $t('text.user.form.firstName') }}</text-input>
        <text-input id="last-name" v-model="form.lastName" :error="form.errors.get('lastName')" :required="true">{{ $t('text.user.form.lastName') }}</text-input>
        <!-- TODO KØN HER!-->
        <text-input id="postnr" :pattern="'[0-9]*'" :inputMode="'numeric'" v-model="form.postnr" :error="form.errors.get('postnr')" :helper="$t('text.user.form.postalHelper')">{{ $t('text.user.form.postal') }}</text-input>
        <text-input id="email" :type="'email'" v-model="form.email" :error="form.errors.get('email')" :required="true" :helper="$t('text.user.form.emailHelper')">{{ $t('text.user.form.email') }}</text-input>
        <text-input id="password" :type="'password'" v-model="form.password" :error="form.errors.get('password')" :required="true" :helper="$t('text.user.form.passwordText')">{{ $t('text.user.form.password') }}</text-input>
        <text-input id="password-confirm" :type="'password'" v-model="form.passwordConfirm" :error="form.errors.get('passwordConfirm')" :required="true">{{ $t('text.user.form.passwordCheck') }}</text-input>
        <div class="flex justify-between flex-wrap">
            <div class="md:w-2/3 px-4 md:mx-1/3">
                <button type="submit" class="btn btn-black w-full">
                    {{ $t('text.user.create') }}
                </button>
            </div>
        </div>

        <!--
        <select-input id="region" v-model="form.region" :options="regioner.regioner"
                      :error="form.errors.get('region')" :required="1">
            Region
        </select-input>

        {{-- Sex --}}
        <fieldset class="mb-4">
            <div class="flex justify-between flex-wrap">
                <legend class="py-2 mb-0 leading-normal md:w-1/3 px-4 pt-0 text-md-right">{{ __('text.user.form.sex.sex') }}</legend>
                <div class="md:w-2/3 px-4">
                    <div class="relative block mb-2">
                        <input class="absolute mt-1 -ml-6" type="radio" name="gridRadios" id="gridRadios1" value="option1">
                        <label class="text-grey-dark pl-6 mb-0" for="gridRadios1">
                            {{ __('text.user.form.sex.man') }}
                        </label>
                    </div>
                    <div class="relative block mb-2">
                        <input class="absolute mt-1 -ml-6" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                        <label class="text-grey-dark pl-6 mb-0" for="gridRadios2">
                            {{ __('text.user.form.sex.woman') }}
                        </label>
                    </div>
                    <div class="relative block mb-2">
                        <input class="absolute mt-1 -ml-6" type="radio" name="gridRadios" id="gridRadios3" value="option3">
                        <label class="text-grey-dark pl-6 mb-0" for="gridRadios3">
                            {{ __('text.user.form.sex.noDef') }}
                        </label>
                    </div>
                </div>
            </div>
        </fieldset>

        -->
    </form>

</template>

<script>
    import {Form} from './Forms';
    import formMixins from "./mixins/formMixins";

    import textInput from './inputs/TextInput';

    // TODO lave det om til datafields med hver sin egen objects - så bare interate over dem og indsætte dem ovenpå?

    export default {
        props: ['post-route'],
        mixins: [formMixins],
        components: {
            'text-input': textInput,
        },
        data: function () {
            return {
                form: new Form({
                    firstName: '',
                    lastName: '',
                    email: '',
                    postnr: '',
                    password: '',
                    password_confirmation: '',
                }),
                success: '',
                successType: '',
                busy: false,
            }
        },
        methods: {
            registerUser() {
                this.busy = true;
                this.form.submit('post', this.postRoute)
                    .then(response => {
                        this.busy = false;
                        this.success = response.message;
                        this.successType = response.type;
                        this.form.password = '';
                        this.form.passwordConfirm = '';
                    })
                    .catch(errors => {
                        console.log(errors);
                    });
            },
            clearSuccessMessage() {
                this.success = '';
                this.successType = '';
            }
        }
    }
</script>