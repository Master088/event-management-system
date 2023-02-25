import { createStore } from "vuex";

import auth from "./modules/auth";
import events from "./modules/event";


const store = createStore({
  state: {},
  getters: {},
  actions: {},
  mutations: {},
  modules: { auth,events },
});

export default store;
