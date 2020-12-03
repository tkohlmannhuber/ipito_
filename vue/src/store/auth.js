import axios from "axios";

export default {

    state: {
        allStates: [
            {
              authenticated: null,
              user: null,
              errors: null,
              success: null,
            },
        ],
    },

    getters: {
        authStates: state => state.allStates,
    },

    mutations: {
      SET_AUTHENTICATED (state, value) {
        state.allStates[0].authenticated = value
      },
      SET_USER (state, value) {
        state.allStates[0].user = value
      },
      SET_ERROR (state, value) {
        state.allStates[0].errors = value
      },
      SET_SUCCESS (state, value) {
        state.allStates[0].success = value
      }

    },

    actions: {
        async login({ commit }, credentials) {
            await axios.post("http://ipito_api.local/api/login", credentials).then((res) => {
              commit('SET_AUTHENTICATED', true)
              commit('SET_USER', res.data)
              commit('SET_SUCCESS', true)            
              commit('SET_ERROR', false)            

            }).catch(() => {
              commit('SET_ERROR', true)            
            });
        },
        async logout({ commit }) {
          await axios.get("http://ipito_api.local/api/logout").then(() => {
            commit('SET_AUTHENTICATED', false)
            commit('SET_USER', null)
            commit('SET_SUCCESS', false)            

          }).catch(() => {
            commit('SET_ERROR', true)            
          });
      },

    },
};

// const response = await axios
// .post("http://ipito_api.local/api/login", this.login)
// .then((res) => {
//     // this.$router.push({ name: "Account" });
//     this.allStates[0].user.username = res.data.username;
//     this.authenticated = true;
//     this.success = true;
// })
// .catch(() => {
//     this.errors = true;
// });
