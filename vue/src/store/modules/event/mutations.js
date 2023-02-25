import {  ADD_EVENT_MUTATION, SET_DASHBOARD_EVENTS, SET_EVENT, SET_EVENTS } from "../../store-constants";

export default {
  //  add other data
  [SET_DASHBOARD_EVENTS](state, payload) {
    state.upcoming_events = payload.upcoming_events;
    state.events_today = payload.events_today;
    state.joined = payload.user_events;
  },
  [SET_EVENTS](state, payload) {
    state.events = payload.events;
  },
  [ADD_EVENT_MUTATION](state, payload) {
    console.log("here31312",payload)
    state.events = [payload.event,...state.events];

  },
  [SET_EVENT](state, payload) {
    state.event = payload.event;
  },

};
