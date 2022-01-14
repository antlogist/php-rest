import Vue from "vue";
import Vuex from "vuex";
import userAnswers from "./modules/userAnswers";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {},
  mutations: {},
  actions: {},
  modules: {
    userAnswers,
  }
});