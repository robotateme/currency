import config from 'config';
import {getAuthHeader} from '../Utils'
import store from '../Store/index';


const auth_url = `${config.apiUrl}/api/profile`;

export const authService = {
    login,
    logout,
    checkAuth,

};

function checkAuth() {
    if (getAuthHeader()) {
        let requestOptions = {
            method: 'GET',
            credentials: 'include',
            headers: {
                'Content-Type': 'application/json',
                ...getAuthHeader()
            },
        };
        return fetch(auth_url, requestOptions)
            .then(handleResponse)
    }
}

function login(email, password) {

    let credentials = window.btoa(email + ':' + password);
    let requestOptions = {
        method: 'GET',
        credentials: 'include',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': 'Basic ' + credentials,
        },
    };

    return fetch(auth_url, requestOptions)
        .then(handleResponse)
        .then(user => {
            if (user) {
                user.authdata = credentials;
                store.state.loggedIn = true
                localStorage.setItem('currency-user', JSON.stringify(user));
            }

            return user;
        });
}

function logout() {
    store.state.loggedIn = false
    localStorage.removeItem('currency-user');
}

function handleResponse(response) {
    console.info(response)
    return response.text().then(text => {
        const data = text && JSON.parse(text);
        if (!response.ok) {
            if (response.status === 401) {
                logout();
                // location.reload(true);
            }

            const error =`${response.status} ${response.statusText}`;
            return Promise.reject(error);
        }

        return data;
    });
}
