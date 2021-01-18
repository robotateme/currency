import VueRouter from 'vue-router';
import routes from './routes';
import {authService} from '../Services';

const router = new VueRouter({
    mode: 'history',
    routes
})

router.beforeEach((to, from, next) => {
    if(to.matched.some(record => record.meta.authRequired)) {
        authService.checkAuth().then(user => {
            next()
        }, error => {
            if(from.name !== 'login') {
                next({
                    path: '/login',
                    query: {redirect: to.path}
                })
            }
        })
    }
    next()
})

export default router;
