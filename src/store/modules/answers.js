import mutations from "../mutations";

const axios = require('axios').default;
const { SET_ANSWERS, GET_PRODUCTS } = mutations;

const answersStore = {
  namespaced: true,
  state: {
    answers: [],
    products: []
  },
  getters: {
    answers: ({ answers }) => answers,
    products: ({ products }) => products
  },
  mutations: {
    [SET_ANSWERS](state, answers) {
      state.answers = answers;
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
        if(message) { console.log(message); }
        console.log(response);
        return response;
      } catch(error) {
        console.log(error);
      } finally {
        console.log("finally");
      }
      commit("SET_ANSWERS", []);
    },
    setAnswers() {

    }
  },
};

export default answersStore;
