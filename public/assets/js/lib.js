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
class Storage {
    constructor() {
        this.has = (key) => {
            return localStorage.getItem(key) != null;
        }
        this.set = (key, value) => {
            localStorage.setItem(key, value);
            return this;
        }
        this.get = (key) => {
            return localStorage.getItem(key);
        }
        this.remove = (key) => {
            localStorage.removeItem(key);
            return this;
        }
        this.clear = () => {
            localStorage.clear();
            return this;
        }
        return this;
    }
}

class Cookie {
    constructor() {
        this.key = undefined;
        this.value = undefined;
        this.has = (name) => {
            return this.get(name) !== null;
        }
        this.set = (name, value, age) => {
            const d = new Date();
            d.setTime(d.getTime() + (age * 24 * 60 * 60 * 1000));
            let expires = "expires=" + d.toUTCString();
            document.cookie = name + "=" + value + ";" + expires + ";path=/";
            this.key = name;
            this.value = value;
            return this;
        }
        this.get = (name) => {
            name += "=";
            let decodedCookie = decodeURIComponent(document.cookie);
            let ca = decodedCookie.split(';');
            for (let i = 0; i < ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    let v = c.substring(name.length, c.length)
                    this.key = name;
                    this.value = v;
                    return v;
                }
            }
            return null
        }
        this.remove = (name) => {
            this.set(name, "", -1);
            return this;
        }
        return this;
    }
    toString() {
        return JSON.stringify({ key: this.key, value: this.value });
    }
}
class Href {
    constructor() {
        this.url = window.location.href;
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
        this.get = (url) => {
            return new Promise(function(resolve, reject) {
                http.onloadend = function() {
                    var response = {
                        body: this.response,
                        status: {
                            code: this.status,
                            text: this.statusText
                        },
                        xhr: this
                    }
                    if (this.status >= 400) {
                        reject(response)
                    } else {
                        var json = undefined
                        try {
                            json = JSON.parse(this.response);
                        } catch (error) {
                            console.error(error);
                        }
                        if (json != undefined) {
                            response.json = json;
                        }
                        resolve(response)
                    }
                };
                http.onerror = function() {
                    var data = {
                        body: this.response,
                        status: {
                            code: this.status,
                            text: this.statusText
                        },
                        xhr: this
                    }
                    reject(data)
                };
                http.open("GET", url, true);
                http.send();
            })
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
    constructor() {
        this.e = undefined;
        this.byID = (id) => {
            this.e = document.getElementById(id);
            return this.e;
        }
        this.byClass = (className) => {
            this.e = document.getElementsByClassName(className);
            return this.e;
        }

        return this;
    }

}

class Toast {
    constructor(msg, option = undefined, storage) {
        this.show = (displayLength = 4000) => {
            M.toast({ html: msg, option: { displayLength: displayLength } });
            return this;
        }
        this.dismiss = () => {
            M.Toast.dismissAll();
            return this;
        }
        this.next = () => {
            storage.set('toast-next', msg);
            return this;
        }
    }
}

class App {
    load() {
        $.getScript("https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js", (Materialize) => {
            eval(Materialize);
            console.log("Materialize " + M.version + " loaded!");
        });
    }
    checkToast() {
        if (this.storage.has('toast-next')) {
            this.toast(this.storage.get('toast-next')).show()
            this.storage.remove('toast-next')
        }
    }
    constructor() {
        this.storage = new Storage();
        this.cookie = new Cookie();
        this.elem = new Elem();
        this.href = new Href();
        this.http = new Http();
        this.reload = (delay = 0) => {
            setTimeout(() => { location.reload() }, delay);
        }
        this.toast = (msg) => { return new Toast(msg, undefined, this.storage) };

        this.checkToast();
        // this.load();
        return this;
    }
}


const http = new Http();