import {
  ADD_EVENT_ACTION,
    ADD_EVENT_MUTATION,
    UPDATE_EVENT_STATUS,
    DELETE_EVENT,
    EDIT_EVENT,
    FETCH_DASHBOARD_EVENTS,FETCH_EVENTS,GET_EVENT,GET_EVENT_REGISTRATIONS,REGISTER,SET_DASHBOARD_EVENTS, SET_DELETE_EVENT, SET_EDIT_EVENT, SET_EVENT, SET_EVENTS, SET_EVENT_REGISTRATIONS, SET_REGISTER, UPDATE_EVENT_REGISTRATION_STATUS, SET_EVENT_REGISTRATION_STATUS, DELETE_REGISTRATION, SET_DELETE_REGISTRATION, GET_UNREGISTERED_STUDENT, SET_UNREGISTERED_STUDENT, REGISTER_STUDENT
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
    async [FETCH_EVENTS](context, payload) {
        /*Call axios get request */
    return  await  axiosClient 
      .get(`event`)
      .then(res => {
        console.log("here",res.data.data)
        context.commit(SET_EVENTS, res.data.data);

      return Promise.resolve(res.data.data)
      })
      .catch(err => {
        console.log(err)
        return Promise.reject(err)
      })
      },

      async [FETCH_DASHBOARD_EVENTS](context, payload) {
        /*Call axios get request */
      axiosClient 
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
    async [ADD_EVENT_ACTION](context, payload) {
        /*Call axios get request */  
     return axiosClient 
      .post(`event`,payload)
      .then(res => {
        console.log("add event 123123",res.data.data.event);

        context.commit(ADD_EVENT_MUTATION, res.data.data.event);
        
        return Promise.resolve(res.data.data.event)
      })
      .catch(err => {
        console.log(err)
        return Promise.reject(err)
      })
      },

      async [GET_EVENT](context, payload) {
        /*Call axios get request */
      return axiosClient 
      .get(`event/${payload.id}` )
      .then(res => {
        console.log(res.data.data)
        context.commit(SET_EVENT, res.data.data);
        return Promise.resolve(res.data.data)
      })
      .catch(err => {
        console.log(err)
        return Promise.reject(err)
      })
      },
      async [EDIT_EVENT](context, payload) {
        /*Call axios get request */ 
        console.log({payload}) 
     return axiosClient 
      .patch(`event/${payload.id}`,payload.data)
      .then(res => {

        console.log("return data1",res.data.data.event);

        context.commit(SET_EDIT_EVENT, res.data.data.event);
        
        return Promise.resolve(res.data.data.event)
      })
      .catch(err => {
        console.log(err)
        return Promise.reject(err)
      })
      },
      async [DELETE_EVENT](context, payload) {
        /*Call axios get request */ 
          console.log({payload}) 
      return axiosClient 
        .delete(`event/${payload.id}`)
        .then(res => {
          context.commit(SET_DELETE_EVENT, payload.id);
          
          return Promise.resolve(res)
        })
        .catch(err => {
          console.log(err)
          return Promise.reject(err)
        })
      },
      async [REGISTER](context, payload) {
        /*Call axios get request */ 
          console.log({payload}) 
      return axiosClient 
        .post(`event/register`,payload  )
        .then(res => {
          console.log(res.data.data.event_registration)
          context.commit(SET_REGISTER, res.data.data.event_registration);
          
          return Promise.resolve(res)
        })
        .catch(err => {
          console.log(err)
          return Promise.reject(err)
        })
      },
      async [GET_EVENT_REGISTRATIONS](context, payload) {
        /*Call axios get request */
        return  await  axiosClient 
        .get(`event/register/${payload.id}`)
        .then(res => {
          console.log("here 12312",res.data.data)
          context.commit(SET_EVENT_REGISTRATIONS, res.data.data.event_registrations);

        return Promise.resolve(res.data.data)
        })
        .catch(err => {
          console.log(err)
          return Promise.reject(err)
        })
      },
      async [UPDATE_EVENT_STATUS](context, payload) {
        /*Call axios get request */
        return  await  axiosClient 
          .patch(`event/status/${payload.id}/`,payload.data)
          .then(res => {
            console.log("here",res.data.data)
            context.commit(SET_EVENT, res.data.data);

            return Promise.resolve(res.data.data)
          })
          .catch(err => {
            console.log(err)
            return Promise.reject(err)
          })
      },
      async [UPDATE_EVENT_REGISTRATION_STATUS](context, payload) {
        /*Call axios get request */
        return  await  axiosClient 
          .patch(`event/register/status/${payload.id}`,payload.data)
          .then(res => {
            console.log("here",res.data.data.event_registration)
            context.commit(SET_EVENT_REGISTRATION_STATUS, {data:res.data.data.event_registration,old_status:payload.old_status});

            return Promise.resolve(res.data.data)
          })
          .catch(err => {
            console.log(err)
            return Promise.reject(err)
          })
      },
      async [DELETE_REGISTRATION](context, payload) {
        /*Call axios get request */ 
          console.log({payload}) 
      return axiosClient 
        .delete(`event/register/delete/${payload.id}`)
        .then(res => {
          context.commit(SET_DELETE_REGISTRATION,payload);
          
          return Promise.resolve(res)
        })
        .catch(err => {
          console.log(err)
          return Promise.reject(err)
        })
      },

      async [GET_UNREGISTERED_STUDENT](context, payload) {
        /*Call axios get request */ 
          console.log({payload}) 
      return axiosClient 
        .get(`event/unregistered/${payload.id}`)
        .then(res => {
          context.commit(SET_UNREGISTERED_STUDENT,res.data.data.students);
          
          return Promise.resolve(res.data.data)
        })
        .catch(err => {
          console.log(err)
          return Promise.reject(err)
        })
      },
      async [REGISTER_STUDENT](context, payload) {
        /*Call axios get request */ 
          console.log({payload}) 
      return axiosClient 
        .post(`event/register-student`,payload  )
        .then(res => {
          console.log(res.data.data.event_registration)
          context.commit(SET_REGISTER, res.data.data.event_registration);
          
          return Promise.resolve(res)
        })
        .catch(err => {
          console.log(err)
          return Promise.reject(err)
        })
      },
};
