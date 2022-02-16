function toast(msg) {
    M.toast({ html: msg })
}

function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return null
}

function reload(delay = 0) {
    setTimeout(location.reload(), delay);
}

function replaceState(url) {
    history.replaceState({}, '', url);
}

class Http {
    constructor() {
        const http = new XMLHttpRequest();
        this.get = (url, onSuccess, onError) => {
            http.onloadend = function(response) {
                if (this.status >= 400) {
                    onError(this.responseText, this.status, response);
                } else {
                    onSuccess(this.responseText, this.status, response);
                }
            };
            http.onerror = function(response) {
                onError(this.responseText, this.status, response);
            };
            http.open("GET", url, true);
            http.send();
        };
        this.post = (url, data, onSuccess, onError) => {
            http.onloadend = function(response) {
                if (this.status >= 400) {
                    onError(this.responseText, this.status, response);
                } else {
                    onSuccess(this.responseText, this.status, response);
                }
            };
            http.onerror = function(response) {
                onError(this.responseText, this.status, response);
            };
            http.open("POST", url, true);
            http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            http.send(data);
        };
        this.put = (url, data, onSuccess, onError) => {
            http.onloadend = function(response) {
                if (this.status >= 400) {
                    onError(this.responseText, this.status, response);
                } else {
                    onSuccess(this.responseText, this.status, response);
                }
            };
            http.onerror = function(response) {
                onError(this.responseText, this.status, response);
            };
            http.open("PUT", url, true);
            http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            http.send(data);
        };
        this.delete = (url, onSuccess, onError) => {
            http.onloadend = function(response) {
                if (this.status >= 400) {
                    onError(this.responseText, this.status, response);
                } else {
                    onSuccess(this.responseText, this.status, response);
                }
            };
            http.onerror = function(response) {
                onError(this.responseText, this.status, response);
            };
            http.open("DELETE", url, true);
            http.send();
        };
    }
}

const http = new Http();