import axios from 'axios'

export default {
  namespaced: true,

  state: {
    authenticated: false,
    user: null
  },

  getters: {
    authenticated (state) {
      return state.authenticated
    },

    user (state) {
      return state.user
    },
  },

  mutations: {
    SET_AUTHENTICATED (state, value) {
      state.authenticated = value
    },

    SET_USER (state, value) {
      state.user = value
    }
  },

  actions: {
    async signIn ({ dispatch }, credentials) {
        await axios.get('http://ipito_api.local/sanctum/csrf-cookie')
        await axios.post('http://ipito_api.local/api/login', credentials)
  
        return dispatch('me')
      },
  
      async signOut ({ dispatch }) {
        await axios.post('http://ipito_api.local/api/logout')
  
        return dispatch('me')
      },
  
      me ({ commit }) {
        return axios.get('http://ipito_api.local/api/user').then((response) => {
          commit('SET_AUTHENTICATED', true)
          commit('SET_USER', response.data)
        }).catch(() => {
          commit('SET_AUTHENTICATED', false)
          commit('SET_USER', null)
        })
      }
  }
}