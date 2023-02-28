import {  ADD_EVENT_MUTATION, DELETE_EVENT, DELETE_REGISTRATION, SET_ADD_USER, SET_ADMIN_USERS, SET_DASHBOARD_EVENTS, SET_DELETE_EVENT, SET_DELETE_REGISTRATION, SET_EDIT_EVENT, SET_EVENT, SET_EVENTS, SET_EVENT_REGISTRATIONS, SET_EVENT_REGISTRATION_STATUS, SET_REGISTER, SET_STUDENT_USERS, SET_TEACHERS_USERS } from "../../store-constants";

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
  
  }
};
