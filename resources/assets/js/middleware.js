import {store} from './store'
import {router} from "./router";

axios.interceptors.response.use(function (response) {
        return response;
    }, (error) => {

        if (error.response.status == 401) {
            store.commit('logout');
            router.push('/login');
        }

        store.commit("error", "Something went wrong! <br> <pre>" + JSON.stringify(error.response.data, null, 2) + "</pre>");

        return Promise.reject(error);
    }
);