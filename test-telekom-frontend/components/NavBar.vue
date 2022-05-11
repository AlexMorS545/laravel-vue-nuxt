<template>
  <nav class="bg-gray-800">
    <div class="wrapper">
      <div class="flex items-center justify-between h-16">
        <div class="flex items-center">
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <NuxtLink to="/" class="link">Главная</NuxtLink>
              <NuxtLink to="/equipment" class="link">Оборудование</NuxtLink>
              <NuxtLink to="/equipment/create" class="link">Добавить оборудование</NuxtLink>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
</template>

<script>
import { BriefcaseIcon } from "@vue-hero-icons/outline"

export default {
  data: () => ({
    title: 'Hello nuxt'
  }),
  components: {
    BriefcaseIcon,
  }
}
</script>
<style>
  .wrapper {
    @apply max-w-7xl mx-auto px-4 sm:px-6 lg:px-8;
  }
  .link {
    @apply text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium;
  }
</style>
