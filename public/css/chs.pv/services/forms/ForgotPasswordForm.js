import Form from "./Form";
import Auth from "~/services/auth";

class ForgotPasswordForm extends Form {
    submit() {
        this.beforeSubmit();
        return Auth.requestResetPassword(this.email);
    }
}

export default ForgotPasswordForm;
