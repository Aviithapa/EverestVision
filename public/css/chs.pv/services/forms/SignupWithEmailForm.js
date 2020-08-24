import Form from "./Form";
import Auth from "~/services/auth";

class SignupWithEmailForm extends Form {
    submit() {
        this.beforeSubmit();
        return Auth.register(this.first_name, this.last_name, this.email, this.password);
    }
}

export default SignupWithEmailForm;
