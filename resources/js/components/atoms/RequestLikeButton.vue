<template>
    <a class="cursor-pointer" href="#">{{countRequested}} <fa-icon :icon="[iconStyle, 'hand-point-up']"></fa-icon></a>
</template>

<script>
    export default {
        props: ['wordId','countRequested','isRequested'],
        computed: {
            iconStyle: function() { return this.isRequested ? 'fas' : 'far'; }
        }
    }
</script>
