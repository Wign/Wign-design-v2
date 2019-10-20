<template>
    <panel-item :field="field">
        <div slot="value">

            <video v-if="field" controls="controls" muted="muted" :poster="imgUrl" preload="auto">
                <source :src="url" type="video/mp4">
                Your browser doesn't support the video tag! See the video at: {{ url }}
            </video>
            <span style="display:block" v-if="field" v-text="field.value"></span>

            <span v-else>&mdash;</span>
        </div>
    </panel-item>
</template>

<script>
    export default {
        props: ['resource', 'resourceName', 'resourceId', 'field'],
        computed: {
            url() {
                return '//www.cameratag.com/videos/' + this.field.value + '/qvga/mp4.mp4';
            },
            imgUrl() {
                return '//www.cameratag.com/assets/' + this.field.value + '/vga_thumb.png';
            },
        }
    }
</script>
