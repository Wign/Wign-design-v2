<template>
    <div class="md:flex my-6">
        <div class="md:flex-shrink-0">
            <slot>
                <video class="md:w-60" controls muted :poster="sign.thumb">
                    <source :src="sign.video" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </slot>
        </div>
        <div class="mt-4 md:mt-0 md:ml-6 border-b border-gray-400 flex flex-col justify-between">
            <div>
                <h1 class="font-bold">{{ sign.word }}</h1>
                <p class="mt-2 italic text-xs">Uploadet {{ uploaded }}</p>
                <p class="mt-2" :hidden="description === false">{{ description }} &hellip;<a :href="link" class="font-bold italic">LÆS MERE</a>
                </p>
            </div>
            <div class="flex-grow-0">
                <p class="text-xs italic mt-2">Uploadet af Sigurd Johansen</p>
                <div class="flex flex-row justify-between my-1">
                    <div><a href="#"><fa-icon :icon="['far', 'thumbs-up']"></fa-icon> 17</a></div>
                    <a href="#"><fa-icon :icon="['fas', 'ellipsis-h']"></fa-icon></a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['sign'],
        data: function () {
            return {
                link: "#",
                uploaded: '01-01-2019',
                description: this.desc === "null" ? false : 'Donec euismod sagittis tellus eu rutrum. Nunc et posuere diam. Morbi at odio ut neque lacinia vehicula. Suspendisse quis varius justo. In ultricies ut dolor pulvinar pulvinar. Duis acconsequat nunc. Morbi at odio ut neque lacinia vehicula.',
            }
        }
    }
</script>
