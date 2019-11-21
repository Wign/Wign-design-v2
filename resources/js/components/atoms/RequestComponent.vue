<template>
    <a class="btn btn-tyrisk-outline mx-1 my-2" :href="link" v-text="literal"></a>
</template>

<script>
    import config from "../../config";

    export default {
        props: ['literal'],
        data: function () {
            return {
                link: config.OPRET_LINK_PREFIX+this.literal
            }
        }
    }
</script>
