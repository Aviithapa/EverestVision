import Form from "./Form";
import Auth from "~/services/auth";

class LoginEmailForm extends Form {
    submit() {
        this.beforeSubmit();
        return Auth.login(this.email, this.password);
    }
}

export default LoginEmailForm;
