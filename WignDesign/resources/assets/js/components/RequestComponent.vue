<template>
    <a class="btn btn-outline-primary text-dark bg-light font-weight-semibold mx-1 my-2 py-2" :href="request.link"><slot></slot></a>
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
