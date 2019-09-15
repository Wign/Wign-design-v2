<template>
    <div>
        <sign-media-component v-for="sign in signs" :sign="sign" :key="sign.id"></sign-media-component>
        <sign-media-contribute-component v-if="withCta"></sign-media-contribute-component>
    </div>
</template>

<script>
    export default {
        props: ['with-cta'],
        data: function() {
            return {
                signs: [
                    {
                        id: 1,
                        word: "Random",
                        video: "https://www.cameratag.com/videos/v-a4975f39-61fc-4506-8f58-f652fa967cc7/qvga/mp4.mp4",
                        thumb: "https://www.cameratag.com/videos/v-a4975f39-61fc-4506-8f58-f652fa967cc7/qvga/thumb.png",
                        thumb_small: "https://www.cameratag.com/videos/v-a4975f39-61fc-4506-8f58-f652fa967cc7/qvga/small_thumb.png"
                    },
                    {
                        id: 2,
                        word: "Hjertebanken",
                        video: "https://www.cameratag.com/videos/v-a4975f39-61fc-4506-8f58-f652fa967cc7/qvga/mp4.mp4",
                        thumb: "https://www.cameratag.com/videos/v-a4975f39-61fc-4506-8f58-f652fa967cc7/qvga/thumb.png",
                        thumb_small: "https://www.cameratag.com/videos/v-a4975f39-61fc-4506-8f58-f652fa967cc7/qvga/small_thumb.png"
                    },
                    {
                        id: 3,
                        word: "Hjerte",
                        video: "https://www.cameratag.com/videos/v-a4975f39-61fc-4506-8f58-f652fa967cc7/qvga/mp4.mp4",
                        thumb: "https://www.cameratag.com/videos/v-a4975f39-61fc-4506-8f58-f652fa967cc7/qvga/thumb.png",
                        thumb_small: "https://www.cameratag.com/videos/v-a4975f39-61fc-4506-8f58-f652fa967cc7/qvga/small_thumb.png"
                    }
                ]
            }
        }
    }
</script>
