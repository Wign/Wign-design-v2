<template>
    <div class="w-1/2 md:w-1/3 lg:w-1/4 my-2 px-2">
        <a class="hover:scale text-xl font-semibold" href="#">
            <div class="relative flex flex-col overflow-hidden bg-black text-white text-center">
                <img class="w-full transition" :src="sign.thumb_small" :alt="sign.word">
                <div class="absolute p-6 items-center flex justify-center h-full w-full">
                    <h5 class="mb-3 mb-0 font-weight-semibold">{{sign.word}}</h5>
                </div>
            </div>
        </a>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                sign: {
                    word: "Hjerte",
                    video: "https://www.cameratag.com/videos/v-a4975f39-61fc-4506-8f58-f652fa967cc7/qvga/mp4.mp4",
                    thumb: "https://www.cameratag.com/videos/v-a4975f39-61fc-4506-8f58-f652fa967cc7/qvga/thumb.png",
                    thumb_small: "https://www.cameratag.com/videos/v-a4975f39-61fc-4506-8f58-f652fa967cc7/qvga/small_thumb.png"
                }
            }
        }
    }
</script>
