import VueRouter from 'vue-router';
import Vue from 'vue';

import TeamList from './components/team/TeamList';
import TeamView from './components/team/TeamView';
import TeamCreate from "./components/team/TeamCreate";
import PlayerList from "./components/player/PlayerList";
import PlayerCreate from "./components/player/PlayerCreate";
import PlayerView from "./components/player/PlayerView";
import AuthRegister from "./components/auth/AuthRegister";
import AuthLogin from "./components/auth/AuthLogin";
import {store} from "./store";

Vue.use(VueRouter);

export const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/register',
            component: AuthRegister
        },

        {
            path: '/login',
            component: AuthLogin
        },

        {
            path: '/teams',
            component: TeamList,
            meta: {
                requiresAuth: true
            }
        },

        {
            path: '/teams/:id',
            component: TeamView,
            meta: {
                requiresAuth: true
            }
        },

        {
            path: '/teams-create',
            component: TeamCreate,
            meta: {
                requiresAuth: true
            }
        },

        {
            path: '/players',
            component: PlayerList,
            meta: {
                requiresAuth: true
            }
        },

        {
            path: '/players-create',
            component: PlayerCreate,
            meta: {
                requiresAuth: true
            }
        },

        {
            path: '/players/:id',
            component: PlayerView,
            meta: {
                requiresAuth: true
            }
        },
    ]
});

router.beforeEach((to, from, next) => {
    const requiresAuth = to.matched.some(record => record.meta.requiresAuth);
    const currentUser = store.state.currentUser;

    store.commit("error", null);

    if(requiresAuth && !currentUser) {
        next('/login');
    } else if(to.path == '/login' && currentUser) {
        next('/');
    } else {
        next();
    }
});