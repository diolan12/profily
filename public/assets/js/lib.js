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

function reload(delay = 500) {
    setTimeout(() => { location.reload() }, delay);
}

function replaceState(url) {
    history.replaceState({}, '', url);
}

function deleteToast() {
    let current = window.location.href.split("?")[0];
    replaceState(current);
}

class Toast {
    constructor(msg, option = undefined) {
        this.show = (displayLength = 4000) => {
            M.toast({ html: msg, option: { displayLength: displayLength } });
            return this;
        }
        this.dismiss = () => {
            M.Toast.dismissAll();
            return this;
        }
    }
}
class Cookie {
    constructor() {
        this.hasCookie = (name) => {
            return this.getCookie(name) !== null;
        }
        this.getCookie = (name) => {
            name += "=";
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
        this.setCookie = (name, value) => {
            const d = new Date();
            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
            let expires = "expires=" + d.toUTCString();
            document.cookie = name + "=" + value + ";" + expires + ";path=/";
            return this;
        }
        this.deleteCookie = (name) => {
            this.setCookie(name, "", -1);
            return this;
        }
    }
}
class Href {
    url = window.location.href;
    constructor() {
        const path = this.url.split("?")[0];
        const param = this.url.split("?")[1];

        this.hasParam = (name) => {
            if (param === undefined) return false;
            let params = param.split("&");
            var r = false;
            for (var i = 0; i < params.length; i++) {
                var p = params[i].split("=");
                if (p[0] == name) {
                    r = true;
                    break;
                }
            }
            return r;
        }
        this.getParam = (name) => {
            if (!this.hasParam(name)) return undefined;
            let params = param.split("&");
            var r = undefined;
            for (var i = 0; i < params.length; i++) {
                var p = params[i].split("=");
                if (p[0] == name) {
                    try {
                        r = decodeURI(p[1]);
                    } catch (error) {
                        console.error(error);
                    }
                    break;
                }
            }
            return r;
        }
        this.clearParams = () => {
            replaceState(path);
            return this;
        }
        this.clearParam = (p = undefined) => {
            let newUrl = path;
            if (p == undefined) {
                replaceState(newUrl);
            } else if (typeof p === 'string' || p instanceof String) {

            }
            return this;
        }
        this.toString = () => {
            return this.url;
        }
        return this;
    }
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
            http.setRequestHeader('Content-type', 'application/json');
            http.send(JSON.stringify(data));
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
            http.setRequestHeader('Content-type', 'application/json');
            http.send(JSON.stringify(data));
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
class Elem {
    element = undefined;
    contructor() {
        this.id = (id) => {
            this.element = document.getElementById(id);
            return this;
        }
        this.class = (className) => {
            return document.getElementsByClassName(className)
        }
        return this;
    }
}
class App {
    load() {
        $.getScript("https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js", (Materialize) => {
            eval(Materialize);
            console.log("Materialize script loaded!");
        });
    }
    constructor() {
        this.elem = new Elem();
        this.http = new Http();
        this.reload = (delay = 0) => {
            setTimeout(() => { location.reload() }, delay);
        }
        this.href = new Href();
        this.cookie = new Cookie();
        this.toast = (msg) => { return new Toast(msg) };
        return this;
    }
}


const http = new Http();
const app = new App();