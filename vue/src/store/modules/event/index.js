import mutations from "./mutations";
import actions from "./actions";
import getters from "./getters";

const token = JSON.parse(localStorage.getItem("token")) || null;
const userData = JSON.parse(localStorage.getItem("user")) || null;

export default {
  namespaced: true,
  state() {
    return {
      events:[],
      upcoming:[],
      events_today:[],
      joined:[],
      event:{}
    };
  },
  mutations,
  getters,
  actions,
};
