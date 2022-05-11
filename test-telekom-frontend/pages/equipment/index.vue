<template>
  <div class="wrapper">
    <h1>{{ title }}</h1>
    <table id="index-table">
      <thead>
        <tr>
          <th v-for="item in labels" :key="item" scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">{{ item }}</th>
        </tr>
      </thead>
      <tbody>
        <tr class="hover:bg-gray-50 cursor-pointer" v-for="item in equipments" :key="item.id" :title="item.name" @click.prevent="showEquipment(item.id)">
          <td class="text-center">{{ item.name }}</td>
          <td class="text-center">{{ item.mask }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>

export default {
  name: 'EquipmentPage',
  data: () => ({
    title: 'Оборудование',
    labels: ['Тип оборудования', 'Mаска SN']
  }),

  async fetch({ store }) {
    if(store.getters['equipments/equipments'].length === 0) {
      await store.dispatch('equipments/fetch')
    }
  },

  computed: {
    equipments() {
      return this.$store.getters['equipments/equipments']
    },
  },
  methods: {
    showEquipment(id) {
      this.$router.push('/equipment/' + id)
    },
  }
}
</script>
<style lang="scss">

h1 {
  @apply mt-5 text-6xl;
}

table {
  @apply bg-gray-200 text-center mt-10 p-5 rounded-xl w-1/2 mx-auto;

  tr {
    a {
      @apply hover:bg-gray-50;
    }
    td {
      @apply p-3;
    }
  }
}

</style>
