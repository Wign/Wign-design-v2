<template>
    <img class="image-thumbnail" :style="{ width, height }" v-if="url" :src="url">
</template>

<script>
export default {
    props: ['resourceName', 'field'],
    computed: {
        url() {
            return '//www.cameratag.com/assets/'+this.field.value+'/qvga_thumb.jpg';
        },

        width() {
            return this.field.width + 'px' || 'auto';
        },

        height() {
            return this.field.width + 'px' || 'auto';
        }
    }
}
</script>
