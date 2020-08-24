import Form from "./Form";
import Auth from "~/services/auth";

class ConfirmSignupForm extends Form {
    async submit() {
        let result = false;
        try {
            this.beforeSubmit();
            await Auth.confirmSignup(this.token);
            this.success('You have successfully confirmed your email.');
            result = true;
        } catch (error) {
            this.error('Oops! Something went wrong while trying to confirm your email.');
        }
        this.afterSubmit();

        return result;
    }
}

export default ConfirmSignupForm;
