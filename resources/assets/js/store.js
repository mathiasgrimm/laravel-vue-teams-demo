import Vue from 'vue';
import Vuex from "vuex";
import {getLocalUser} from "./auth";

Vue.use(Vuex);

export const store = new Vuex.Store(
    {
        state: {
            currentUser: getLocalUser(),
            error: null,
        },
        getters: {
            currentUser(state) {
                return state.currentUser;
            },
            error(state) {
                return state.error;
            }
        },
        mutations: {
            loginSuccess(state, payload) {
                state.currentUser = Object.assign({}, payload.user, {token: payload.access_token});
                localStorage.setItem("user", JSON.stringify(state.currentUser));
                axios.defaults.headers.common["Authorization"] = `Bearer ${payload.access_token}`
            },
            logout(state) {
                localStorage.removeItem("user");
                state.currentUser = null;
                axios.defaults.headers.common["Authorization"] = null;
            },
            error(state, payload) {
                state.error = payload;
            }
        },
        actions: {

        }
    }
);