class InputField {

    constructor(elem, activity) {
        this.Activity = activity;
        this.elem = elem;
        this.init();
    }

    init() {
        let _InputField = this;
        _InputField.elem.addEventListener('input', (event) => {
            _InputField.onChange(event);
        });
    }

    onChange(event) {
        if (!this.isEmpty()) {
            this.Activity.AQ.activateConfirm();
        }
    }

    isEmpty(){
        return (this.elem.value.length == 0);
    }

    activate(){
        this.elem.removeAttribute('disabled');
    }
    deactivate(){
        this.elem.setAttribute('disabled', 'true');
    }

    get value() {
        return this.elem.value;
    }

    reset(){
        this.activate();
        this.elem.value = "";
    }


}

export default InputField;