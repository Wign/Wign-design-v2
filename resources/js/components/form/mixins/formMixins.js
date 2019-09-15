//import {parseISO, format, isBefore, formatDistanceStrict} from 'kandelborg-date-fns';
//import da from 'kandelborg-date-fns/locale/da';

export default {
    props: ['value', 'id', 'type', 'pattern', 'inputMode', 'error', 'helper', 'required', 'autocomplete', 'autofocus'],
    data: function () {
        return {
            defaultInputClass: ["input", "input-default", "w-2/3"],
            defaultLabelClass: ["w-1/3"],
            defaultFormClass: ["mt-8", "md:w-2/3", "lg:w-full"],
            defaultRowClass: ["mb-4", "flex", "justify-between", "flex-wrap"],
            requiredClass: ["text-red-500", "semibold"],
            defaultErrorFeedback: ["w-full", "mt-1", "text-red-600", "font-semibold"],
            defaultHelperClass: ["mt-1", "text-gray-600"],
            //noDataInKommendeTable: "",
        }
    },
    methods: {
        count: function (value) {
            return value.length;
        },
    },
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
};