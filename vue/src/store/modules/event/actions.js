import {
  ADD_EVENT_ACTION,
    ADD_EVENT_MUTATION,
    FETCH_DASHBOARD_EVENTS,FETCH_EVENTS,GET_EVENT,SET_DASHBOARD_EVENTS, SET_EVENT, SET_EVENTS
} from "../../store-constants";
import axiosClient from "../../../axios";

export default {
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
    async [FETCH_EVENTS](context, payload) {
        /*Call axios get request */
      axiosClient 
      .get(`event`)
      .then(res => {
        console.log(res.data.data)
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
      axiosClient 
      .post(`event`,payload)
      .then(res => {
        console.log("add event 123123",res.data.data);

        context.commit(ADD_EVENT_MUTATION, res.data.data);
        
        return Promise.resolve(res.data.data)
      })
      .catch(err => {
        console.log(err)
        return Promise.reject(err)
      })
      },

      async [GET_EVENT](context, payload) {
        /*Call axios get request */
      axiosClient 
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
};
