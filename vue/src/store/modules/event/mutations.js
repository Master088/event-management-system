import {  ADD_EVENT_MUTATION, DELETE_EVENT, DELETE_REGISTRATION, SET_DASHBOARD_EVENTS, SET_DELETE_EVENT, SET_DELETE_REGISTRATION, SET_EDIT_EVENT, SET_EVENT, SET_EVENTS, SET_EVENT_REGISTRATIONS, SET_EVENT_REGISTRATION_STATUS, SET_REGISTER } from "../../store-constants";

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
    state.events = [payload,...state.events];

  },
  [SET_EDIT_EVENT](state, payload) {
    console.log("here31312",payload)
    let index = state.events.findIndex(x => x.id == payload.id)
    console.log("hello",state.events[index])
    state.events[index] = payload;
  },
  [SET_DELETE_EVENT](state, payload) {
    console.log("delete",payload)
    state.events= state.events.filter(x => x.id != payload)
  },
  [SET_EVENT](state, payload) {
    state.event = payload.event;
  },
  [SET_REGISTER](state, payload) {
    state.event_registrations = [payload,...state.event_registrations];
    state.event_registrations_count.pending=state.event_registrations_count.pending+1
  },
  [SET_EVENT_REGISTRATIONS](state, payload) {
  
    state.event_registrations = payload;
    state.event_registrations_count.approve= state.event_registrations.filter(x => x.status == "approve").length
    state.event_registrations_count.denied= state.event_registrations.filter(x => x.status == "denied").length
    state.event_registrations_count.pending= state.event_registrations.filter(x => x.status == "pending").length

  },
  [SET_EVENT_REGISTRATION_STATUS](state, payload) {
   
    let index = state.event_registrations.findIndex(x => x.id == payload.data.id)
    console.log("hello",state.event_registrations[index])
    state.event_registrations[index] = payload.data;

    state.event_registrations_count.approve= state.event_registrations.filter(x => x.status == "approve").length
    state.event_registrations_count.denied= state.event_registrations.filter(x => x.status == "denied").length
    state.event_registrations_count.pending= state.event_registrations.filter(x => x.status == "pending").length
   
  },
  [SET_DELETE_REGISTRATION](state, payload) {
    state.event_registrations= state.event_registrations.filter(x => x.id != payload.id)
    
    state.event_registrations_count.approve= state.event_registrations.filter(x => x.status == "approve").length
    state.event_registrations_count.denied= state.event_registrations.filter(x => x.status == "denied").length
    state.event_registrations_count.pending= state.event_registrations.filter(x => x.status == "pending").length
  },
  
};
