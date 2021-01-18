const routes = [
    {
        path: '',
        component: () => import('../Pages/Home.vue'),
        name: 'home',
        meta: {
            authRequired: false
        }
    },
    {
        path: '/about',
        component: () => import('../Pages/About.vue'),
        name: 'about',
        meta: {
            authRequired: false
        }
    },
    {
        path: '/posts',
        component: () => import('../Pages/Posts.vue'),
        name: 'posts',
        meta: {
            authRequired: false
        }
    },
    {
        path: '/notifications',
        component: () => import('../Pages/Notifications.vue'),
        name: 'notifications',
        meta: {
            authRequired: true
        }
    },
    {
        path: '/rates',
        component: () => import('../Pages/Rates.vue'),
        name: 'rates',
        meta: {
            authRequired: false
        }
    },
    {
        path: '/login',
        component: () => import('../Pages/Login.vue'),
        name: 'login',
        meta: {
            authRequired: false
        }
    },
    {
        path: '/profile',
        component: () => import('../Pages/Profile.vue'),
        name: 'profile',
        meta: {
            authRequired: true
        }
    },
]

export default routes;
