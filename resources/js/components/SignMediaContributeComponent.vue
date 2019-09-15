<template>
    <div class="md:flex my-6">
        <div class="md:flex-shrink-0">
            <div class="w-220 h-140 bg-summergreen-translucent-20">
                <a href="#" class="hover:scaleBig">
                    <fa-icon icon="plus-circle" size="4x" class="mx-auto h-full block transition"></fa-icon>
                </a>
            </div>
        </div>
        <div class="mt-4 md:mt-0 md:ml-6">
            <h1 class="font-bold text-4xl tracking-wide">Dit tegn?</h1>
            <p class="mt-2">Har du et tegn på <span class="italic">{{ word }}</span> du synes mangler her?</p>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['word']
    }
</script>
