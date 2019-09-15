<template>
    <div class="col-4 col-md-3 col-lg-2 my-2">
        <a class="sign-link" href="#">
            <div class="card card-block img-scale-hover d-flex bg-dark text-white border-0 rounded-0 text-center">
                <img class="card-img rounded-0" :src="sign.thumb_small" :alt="sign.word">
                <div class="card-img-overlay align-items-center d-flex justify-content-center">
                    <h5 class="card-title mb-0 font-weight-semibold">{{sign.word}}</h5>
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
