<template>
  <div class="wrapper">
    <h1>Добавить оборудование</h1>
    <span v-if="error" v-show="show" class="alert hidden">
      <p v-for="message in errorMessages" :key="message">{{ message }}</p>
      <PlusSmIcon @click.prevent="closeWindow"/>
    </span>
    <form @submit.prevent="onSubmit">
      <h3>Добавить оборудование</h3>
      <select v-model="equipment_type_id">
        <option value="">Выберите тип оборудования</option>
        <option v-for="item in equipments" :key="item.id" :value="item.id">{{ item.name }}</option>
      </select>
      <input name="serial_number" v-model="serial_number" type="text" placeholder="Введите серийный номер">
      <textarea name="note" v-model="note" rows="3" placeholder="Введите примечание"></textarea>
      <button type="submit">Сохранить</button>
    </form>
  </div>
</template>

<script>
import {PlusSmIcon} from '@vue-hero-icons/outline'

export default {
  name: "CreatePage",
  components: {
    PlusSmIcon
  },
  async fetch({ store }) {
    if(store.getters['equipments/equipments'].length === 0) {
      await store.dispatch('equipments/fetch')
    }
  },

  data: () => ({
    equipment_type_id: '',
    serial_number: '',
    note: '',
    errorMessages: [],
    error: false,
    show: false
  }),

  methods: {
    onSubmit() {
      this.validateFields()
      if (this.errorMessages.length === 0) {

        this.$axios.post(this.$config.baseURL+'/equipment/create', {
          equipment_type_id: this.equipment_type_id,
          serial_number: this.serial_number,
          note: this.note,
        }).then(res => {
          this.equipment_type_id = ''
          this.serial_number = ''
          this.note = ''
          this.error = true
          this.show = true
          const errorsMessage = res.data.success
          this.errorMessages.push(errorsMessage)
          this.addEquipment(res.data.equipment)
        })
          .catch(error => {
            if (error.response) {
              this.errorMessages = []
              this.error = true
              this.show = true
              const errorsMessage = error.response.data.errors
              for (let key in errorsMessage) {
                this.errorMessages.push(errorsMessage[key][0])
              }
            }
        })
      }
      else {
        this.error = true
        this.show = true
        this.errorMessages.push('Ошибка отправки формы!')
      }
    },
    addEquipment(equipment) {
      this.$store.dispatch('equipments/addEquipment', equipment)
    },
    validateFields() {
      this.errorMessages = []
      this.error = false
      this.show = false
      document.querySelector('input').classList.remove('alert')
      document.querySelector('select').classList.remove('alert')
      if (!this.equipment_type_id) {
        this.error = true
        this.show = true
        this.errorMessages.push('Обязательное поле')
        document.querySelector('select').classList.add('alert')
      }
      if (this.serial_number.length < 9) {
        this.error = true
        this.show = true
        this.errorMessages.push('Минимальная длина 8 символов')
        document.querySelector('input').classList.add('alert')
      }

    },
    closeWindow() {
      this.error = false
      this.show = false
    }
  },
  computed: {
    equipments() {
      return this.$store.getters['equipments/equipments']
    },
  },
}
</script>

<style lang="scss" scoped>
form {
    @apply bg-gray-200 text-center mt-10 p-5 rounded-xl w-1/2 mx-auto;

    input, select, textarea {
        @apply mt-5 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm;
    }

    button {
        @apply mt-5 inline-flex justify-center py-3 px-7 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-800;
    }
}
.alert {
  @apply border-red-500;
}
span.alert {
  @apply relative border-red-500 bg-red-200 text-red-800 rounded-md block w-1/2 text-center p-5 mx-auto my-10;
  svg {
    transform: rotate(45deg);
    @apply block absolute top-2 right-2 cursor-pointer;
  }
}
</style>
