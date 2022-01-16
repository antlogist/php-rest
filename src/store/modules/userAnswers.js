import mutations from "../mutations";

const axios = require('axios').default;
const { SET_ANSWERS, SET_PRODUCTS } = mutations;

const answersStore = {
  namespaced: true,
  state: {
    answers: {},
    products: []
  },
  getters: {
    answers: ({ answers }) => answers,
    products: ({ products }) => products
  },
  mutations: {
    [SET_ANSWERS](state, {answerNum, answer}) {
      state.answers[answerNum] = {answer};
    },
    [SET_PRODUCTS](state, products) {
      state.products = products;
    },
  },
  actions: {
    async getProducts({ state, commit }) {

      try {
        const data = state.answers;
        // const response = await axios.post(`${themeUrl}/api/filter-tool/app/products/read2.php`, data);
        const response = await axios.post(`./app/products/read.php`, data);

        const message = response.data.message;
        if(message) {
          console.log(message);
          commit('SET_PRODUCTS', []);
          return message;
        }

        const products = response.data.products;

        commit('SET_PRODUCTS', products);

        return response;
      } catch(error) {
        console.log(error);
      }
    },
    setAnswers({ commit, dispatch }, { answerNum, answer }) {
      commit("SET_ANSWERS", { answerNum, answer });

      dispatch("getProducts", null, { root: false });

    }
  },
};

export default answersStore;
