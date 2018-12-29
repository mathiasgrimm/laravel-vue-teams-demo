import {store} from "./store";
import {router} from "./router";

export function login(credentials) {
    return new Promise((res, rej) => {
        axios.post('/api/auth/login', credentials)
            .then((response) => {
                res(response.data);
            })
            .catch((err) => {
                rej("Wrong email or password");
            })
    })
}

export function doLogin(credentials)
{
    login(credentials)
        .then((res) => {
            store.commit("loginSuccess", res);
            router.push({path: '/'});
        });
}

export function getLocalUser() {
    const userStr = localStorage.getItem("user");

    if (!userStr) {
        return null;
    }

    return JSON.parse(userStr);
}