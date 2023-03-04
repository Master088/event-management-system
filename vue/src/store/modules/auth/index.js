import mutations from "./mutations";
import actions from "./actions";
import getters from "./getters";

const token = JSON.parse(localStorage.getItem("token")) || null;
const userData = JSON.parse(localStorage.getItem("user")) || {
  fullname:"user"
};

export default {
  namespaced: true,
  state() {
    return {
      token: token || null,
      user:userData || null,
    };
  },
  mutations,
  getters,
  actions,
};
