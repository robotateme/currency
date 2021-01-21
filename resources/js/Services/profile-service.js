import config from 'config';
import {getAuthHeader} from "../Utils";
import {authService} from "./auth-service";

const upload_url_avatar = `${config.apiUrl}/api/profile`;

export const profileService = {
    uploadAvatar,
};

function uploadAvatar(formData) {
    return axios.post(upload_url_avatar, formData, {
        headers: {
            'Content-Type': 'multipart/form-data',
            ...getAuthHeader()
        },
    }).then(function(data) {
       console.log(data);
    }.bind(this)).catch(function(data) {
        console.log('error');
    });
}
