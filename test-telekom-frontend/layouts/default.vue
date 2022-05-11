<template>
  <div>
    <NavBar/>
    <main>
      <nuxt/>
    </main>
  </div>
</template>

<script>
import NavBar from "@/components/NavBar";

export default {
  name: "Default",
  components: {
    NavBar
  }
}
</script>

<style scoped>

</style>
