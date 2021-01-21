import config from 'config';
import {getAuthHeader} from "../Utils";

const data_url = `${config.apiUrl}/api/posts`;

export const postsService = {
    getAll,
};

function getAll() {
    let requestOptions = {
        method: 'POST',
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
            const error =`${response.status} ${response.statusText}`;
            return Promise.reject(error);
        }
        return data;
    });
}

