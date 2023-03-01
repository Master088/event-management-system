import { createStore } from "vuex";

import auth from "./modules/auth";
import events from "./modules/event";
import users from "./modules/user";

const store = createStore({
  state: {},
  getters: {},
  actions: {},
  mutations: {},
  modules: { auth,events,users },
});

export default store;
