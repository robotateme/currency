

export function getAuthHeader() {
    let user = JSON.parse(localStorage.getItem('currency-user'));
    if (user && user.authdata) {
        return { 'Authorization': 'Basic ' + user.authdata};
    } else {
        return {};
    }
}
