<template>
    <a class="btn btn-tyrisk-outline mx-1 my-2" :href="request.link"><slot></slot></a>
</template>

<script>
    export default {
        data: function () {
            return {
                request: {
                    word: "Random",
                    link: "#",
                }
            }
        }
    }
</script>
