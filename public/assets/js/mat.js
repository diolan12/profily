class Modal {
    constructor(id, options = undefined, elem) {
        this.id = id;
        this.e = M.Modal.init(elem.byID(id), options);
        return this;
    }

    open() {
        this.e.open();
        return this;
    }

    close() {
        this.e.close();
        return this;
    }
}
class Mat {
    constructor(elem) {
        this.modal = (id, options) => { return new Modal(id, options, elem) }
    }
}
const mat = new Mat(new Elem());