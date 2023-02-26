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
      event_registrations:[],
      event_registrations_count:{
        approve:0,
        denied:0,
        pending:0
      },
      upcoming_events:[],
      events_today:[],
      joined:[],
      event:{}
    };
  },
  mutations,
  getters,
  actions,
};
