<template>
  <div class="wrapper">
    <h1>{{ title }}</h1>
    <img :src="imageSrc" :alt="title">
  </div>
</template>

<script>

export default {
  name: 'IndexPage',
  data: () => ({
    title: 'Главная страница',
    imageSrc: 'https://m.media-amazon.com/images/I/31rn9e1dERL._AC_.jpg'
  })
}
</script>
<style lang="scss">

h1 {
  @apply mt-5 text-6xl text-center;
}

img {
  @apply mt-10 mx-auto;
}
</style>