import {  ADD_EVENT_MUTATION, DELETE_EVENT, DELETE_REGISTRATION, SET_ADD_USER, SET_ADMIN_USERS, SET_DASHBOARD_EVENTS, SET_DELETE_EVENT, SET_DELETE_REGISTRATION, SET_DELETE_USER, SET_EDIT_EVENT, SET_EVENT, SET_EVENTS, SET_EVENT_REGISTRATIONS, SET_EVENT_REGISTRATION_STATUS, SET_REGISTER, SET_STUDENT_USERS, SET_TEACHERS_USERS, SET_UPDATE_USER } from "../../store-constants";

export default {
  //  add other data
  [SET_ADMIN_USERS](state, payload) {
    state.admins = payload;
  },
  [SET_TEACHERS_USERS](state, payload) {
    state.teachers = payload;
  },
  [SET_STUDENT_USERS](state, payload) {
    state.students = payload;
  },
  [SET_ADD_USER](state, payload) {
    if(payload.role=="admin"){
      state.admins = [payload,...state.admins];
    }else if(payload.role=="teacher"){
      state.teachers = [payload,...state.teachers];
    }else if(payload.role=="student"){
      state.students = [payload,...state.students];
    }
  },
   [SET_UPDATE_USER](state, payload) {
      console.log("pay",payload)
    if(payload.role=="admin"){
      let index = state.admins.findIndex(x => x.id == payload.id)
      state.admins[index] = payload;
      // state.admins = [payload,...state.admins];
    }else if(payload.role=="teacher"){
      let index = state.teachers.findIndex(x => x.id == payload.id)
      state.teachers[index] = payload;
      // state.teachers = [payload,...state.teachers];
    }else if(payload.role=="student"){
      let index = state.students.findIndex(x => x.id == payload.id)
      state.students[index] = payload;
      // state.students = [payload,...state.students];
    }
  
  },
  [SET_DELETE_USER](state, payload) {
   
      state.admins= state.admins.filter(x => x.id != payload.id)
   
      state.teachers= state.teachers.filter(x => x.id != payload.id)
 
      state.students= state.students.filter(x => x.id != payload.id)
     
  
  },

};
