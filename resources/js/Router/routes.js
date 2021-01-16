const routes = [
    {
        path: '',
        component: () => import('../Pages/Home.vue'),
        name: 'home'
    },
    {
        path: '/about',
        component: () => import('../Pages/About.vue'),
        name: 'about'
    },
    {
        path: '/posts',
        component: () => import('../Pages/Posts.vue'),
        name: 'posts'
    },
    {
        path: '/notifications',
        component: () => import('../Pages/Notifications.vue'),
        name: 'notifications'
    },
    {
        path: '/rates',
        component: () => import('../Pages/Rates.vue'),
        name: 'rates'
    },
    {
        path: '/login',
        component: () => import('../Pages/Login.vue'),
        name: 'login'
    },
    {
        path: '/logout',
        component: () => import('../Pages/Logout.vue'),
        name: 'logout'
    },
    {
        path: '/profile',
        component: () => import('../Pages/Profile.vue'),
        name: 'profile'
    },
]

export default routes;
