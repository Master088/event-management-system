import {
  ADD_EVENT_ACTION,
    ADD_EVENT_MUTATION,
    UPDATE_EVENT_STATUS,
    DELETE_EVENT,
    EDIT_EVENT,
    FETCH_DASHBOARD_EVENTS,FETCH_EVENTS,GET_EVENT,GET_EVENT_REGISTRATIONS,REGISTER,SET_DASHBOARD_EVENTS, SET_DELETE_EVENT, SET_EDIT_EVENT, SET_EVENT, SET_EVENTS, SET_EVENT_REGISTRATIONS, SET_REGISTER, UPDATE_EVENT_REGISTRATION_STATUS, SET_EVENT_REGISTRATION_STATUS, DELETE_REGISTRATION, SET_DELETE_REGISTRATION, GET_USER_BY_ROLE, SET_ADMIN_USERS, SET_TEACHERS_USERS, SET_STUDENT_USERS, ADD_USER, SET_ADD_USER, UPDATE_USER, SET_UPDATE_USER, DELETE_USER, SET_DELETE_USER
} from "../../store-constants";
import axiosClient from "../../../axios";

export default {
    async [FETCH_DASHBOARD_EVENTS](context, payload) {
        /*Call axios get request */
      return await axiosClient 
      .get(`event/dashboard` )
      .then(res => {
        console.log(res.data.data)
        context.commit(SET_DASHBOARD_EVENTS, res.data.data);
        return Promise.resolve(res.data.data)
      })
      .catch(err => {
        console.log(err)
        return Promise.reject(err)
      })
      },

    async [GET_USER_BY_ROLE](context, payload) {
        /*Call axios get request */
      return await axiosClient 
        .get(`accounts/${payload.role}` )
        .then(res => {
          console.log(res.data.data)
          if(payload.role=="admin"){
            context.commit(SET_ADMIN_USERS, res.data.data.users);
          }else if(payload.role=="teacher"){
            context.commit(SET_TEACHERS_USERS, res.data.data.users);
          }else if(payload.role=="student"){
            context.commit(SET_STUDENT_USERS, res.data.data.users);
          }
          return Promise.resolve(res.data.data)
        })
        .catch(err => {
          console.log(err)
          return Promise.reject(err)
        })
        },
        async [ADD_USER](context, payload) {
          /*Call axios get request */ 
        console.log("here",{payload}) 

        var data = new FormData();
        data.append('fullname', payload.fullname);
        data.append('email', payload.email);
        data.append('password', payload.password);
        data.append('password_confirmation', payload.password_confirmation);
        data.append('cellphone_number', payload.cellphone_number);
        data.append('gender', payload.gender);
        data.append('role', payload.role);
        data.append('profile_picture', payload.profile_picture);
        data.append('section', '');
        data.append('id_number', '');

        return axiosClient 
          .post(`account/register/`,data)
          .then(res => {
            console.log(res.data)

            context.commit(SET_ADD_USER, res.data.user);
            
            return Promise.resolve(res)
          })
          .catch(err => {
            console.log(err)
            return Promise.reject(err)
          })
        },
        async [UPDATE_USER](context, payload) {
          /*Call axios get request */ 
        console.log("here",{payload}) 
        return axiosClient 
          .post(`account/${payload.id}`,payload.data)
          .then(res => {
            console.log("re",res.data.data)

            context.commit(SET_UPDATE_USER, res.data.data.user);
            
            return Promise.resolve(res)
          })
          .catch(err => {
            console.log(err)
            return Promise.reject(err)
          })
        },
        async [DELETE_USER](context, payload) {
          /*Call axios get request */ 
            console.log({payload}) 
        return axiosClient 
          .delete(`account/delete/${payload.id}`)
          .then(res => {
            context.commit(SET_DELETE_USER,payload);
            
            return Promise.resolve(res)
          })
          .catch(err => {
            console.log(err)
            return Promise.reject(err)
          })
        },
};
