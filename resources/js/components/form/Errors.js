export class Errors {

    constructor() {
        this.errors = {};
        this.message = '';
    }

    has(field) {
        return this.errors.hasOwnProperty(field);
    }

    any() {
        return Object.keys(this.errors).length > 0 || this.message !== '';
    }

    anyField() {
        return Object.keys(this.errors).length > 0;
    }

    get(field) {
        if (this.errors[field]) {
            return this.errors[field][0];
        }
    }

    record(errors) {
        console.log(errors.errors);
        console.log(errors.message);
        if(typeof errors.errors !== 'undefined') {
            this.errors = errors.errors;
        }
        this.message = errors.message;
    }

    clear(field) {
        if (field) {
            delete this.errors[field];
            if (!this.anyField()) {
                this.message = '';
            }
            return;
        }
        this.errors = {};
        this.message = '';
    }
}