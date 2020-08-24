import axios from 'axios';

class Form {
    /**
     * Create a new Form instance.
     *
     * @param {object} data
     */
    constructor(data) {
        this.originalData = data;

        for (let field in data) {
            this[field] = data[field];
        }


        this.submitting = false;

        this.buffer = {};
    }


    /**
     * Fetch all relevant data for the form.
     */
    data() {
        let data = {};

        for (let property in this.originalData) {
            data[property] = this[property];
        }

        return data;
    }


    /**
     * Reset the form fields.
     */
    reset() {
        for (let field in this.originalData) {
            this[field] = '';
        }
        this.$validator.reset();
    }

    /**
     * Submit the form.
     */
    beforeSubmit() {
        this.submitting = true;
    }

    afterSubmit() {
        this.submitting = false;
    }

    validate() {
        return !this.submitting && this.$validator.validateAll()
    }

    success(message) {
        this.$snack.success({
            text: message,
            button: "close"
        });
    }

    error(message) {
        this.$snack.danger({
            text: message,
            button: "close"
        });
    }

    handleError(error) {
        if (error.response.status === 422) {
            let validationErrors = error.response.data.errors;
            for (let field in this.originalData) {
                if (validationErrors.hasOwnProperty(field)) {
                    this.$validator.errors.add({
                        field,
                        msg: validationErrors[field][0]
                    });
                }
            }
        } else {
            this.error(error.response.data.error.message);
        }
    }

}

export default Form;
