<template>
    <div>
        <request-button :class="btnClass" :literal="request.literal">
            <span :class="textClass">{{request.literal}}</span>
            <request-like-button v-if="showLike" :wordId="request.id" :countRequested="request.requesters_count" :isRequested="request.user_requested" class="absolute bottom-0 right-0 px-5 py-1"></request-like-button>
        </request-button>
    </div>
</template>

<script>
    import RequestButton from "../atoms/RequestButton";

    export default {
        components: {RequestButton},
        props: ['request','size'],
        computed: {
            btnClass: function() {
                let defaultCSS = 'flex flex-col justify-center whitespace-pre-wrap';
                switch (this.size) {
                    case 'lg':
                        return defaultCSS + ' w-full min-h-64';
                    case 'md':
                        return defaultCSS + ' w-full min-h-32';
                    default:
                        return defaultCSS + '';
                }
            },
            textClass: function() {
                switch (this.size) {
                    case 'lg':
                        return 'text-3xl';
                    case 'md':
                        return 'text-lg';
                    default:
                        return '';
                }
            },
            showLike: function() {
                switch (this.size) {
                    case 'lg':
                    case 'md':
                        return true;
                    default:
                        return false;
                }
            }
        }
    }
</script>
