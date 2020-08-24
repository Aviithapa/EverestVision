import Form from "./Form";
import Auth from "~/services/auth";

class ResetPasswordForm extends Form {
    submit() {
        this.beforeSubmit();
        return Auth.resetPassword(this.email, this.password, this.password_confirmation, this.resetToken);
    }
}

export default ResetPasswordForm;
