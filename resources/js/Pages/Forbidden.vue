<script setup>
import { ref, onMounted } from 'vue';

const imagesUrl = [
    "http://127.0.0.1:5173/resources/js/Pages/Img/forbidden.png",
    "http://127.0.0.1:5173/resources/js/Pages/Img/forbidden2.png",
    "http://127.0.0.1:5173/resources/js/Pages/Img/forbidden3.png",
    "http://127.0.0.1:5173/resources/js/Pages/Img/forbidden4.png",
    "http://127.0.0.1:5173/resources/js/Pages/Img/forbidden5.png",
    "http://127.0.0.1:5173/resources/js/Pages/Img/forbidden6.png",
    "http://127.0.0.1:5173/resources/js/Pages/Img/forbidden7.png",
    "http://127.0.0.1:5173/resources/js/Pages/Img/forbidden8.png",
    "http://127.0.0.1:5173/resources/js/Pages/Img/forbidden9.png",
    "http://127.0.0.1:5173/resources/js/Pages/Img/forbidden10.png",
    "http://127.0.0.1:5173/resources/js/Pages/Img/forbidden11.png",
    "http://127.0.0.1:5173/resources/js/Pages/Img/forbidden12.png",
    "http://127.0.0.1:5173/resources/js/Pages/Img/forbidden13.png"
];

const image = ref('');

onMounted(() => {
    const index = Math.floor(Math.random() * imagesUrl.length);
    image.value = imagesUrl[index];
});
</script>

<template>
    <div class="h-screen bg-cover bg-center" :style="{ backgroundImage: 'url(' + image + ')' }">
    </div>
</template>
