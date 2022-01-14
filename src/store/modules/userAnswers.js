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
    async getProducts({ commit }) {

      try {
        const data = {
          'answer_one': false
        };
        const response = await axios.post(`./app/products/read.php`, data);

        const message = response.data.message;
        if(message) {
          console.log(message);
          return message;
        }

        const products = response.data.products;

        console.log(products);

        commit('SET_PRODUCTS', products);

        return response;
      } catch(error) {
        console.log(error);
      } finally {
        console.log("finally");
      }
    },
    setAnswers({ commit, dispatch }, { answerNum, answer }) {
      commit("SET_ANSWERS", { answerNum, answer });

      dispatch("getProducts", null, { root: false });

      console.log(this.state);
    }
  },
};

export default answersStore;
