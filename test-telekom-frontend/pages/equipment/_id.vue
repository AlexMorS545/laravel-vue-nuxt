<template>
  <div class="wrapper">
    <h1>{{ equipment.name }}</h1>
  </div>
</template>

<script>
export default {
  async asyncData({ $axios, $config, params }) {
    const equipment = await $axios.$get($config.baseURL + '/equipment/' + params.id)
    return { equipment }
  },
}
</script>
