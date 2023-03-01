import mutations from "./mutations";
import actions from "./actions";
import getters from "./getters";


export default {
  namespaced: true,
  state() {
    return {
      admins:[],
      teachers:[],  
      students:[],  
    };
  },
  mutations,
  getters,
  actions,
};
