import config from 'config';
import {getAuthHeader} from '../Utils'
import {authService} from '../Services'
const data_url = `${config.apiUrl}/api/notifications`;

export const notificationsService = {
    getAll,
};

function getAll() {
    let requestOptions = {
        method: 'GET',
        credentials: 'include',
        headers: {
            'Content-Type': 'application/json',
            ...getAuthHeader()
        },
    };
    return fetch(data_url, requestOptions)
        .then(handleResponse)
}

function handleResponse(response) {
    return response.text().then(text => {
        const data = text && JSON.parse(text);
        if (!response.ok) {
            if (response.status === 401) {
                authService.logout();
                // location.reload(true);
            }
            const error =`${response.status} ${response.statusText}`;
            return Promise.reject(error);
        }

        return data;
    });
}
