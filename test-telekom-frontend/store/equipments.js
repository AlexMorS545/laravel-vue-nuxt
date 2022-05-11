export const state = () => ({
    equipments: [],
})

export const mutations = {
    setEquipments(state, equipments) {
        state.equipments = equipments
    },
    addEquipment(state, equipment) {
      state.equipments.push(equipment)
    }
}

export const actions = {
    async fetch({ commit }) {
        const equipments = await this.$axios.$get(this.$config.baseURL+'/equipment')
        commit('setEquipments', equipments)
    },
    addEquipment({ commit }, equipment) {
      commit('addEquipment', equipment)
    }
}

export const getters = {
    equipments: (state) => state.equipments
}
