<template>
    <a class="btn btn-tyrisk-outline my-2 relative" :href="link"><slot>{{literal}}</slot></a>
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
