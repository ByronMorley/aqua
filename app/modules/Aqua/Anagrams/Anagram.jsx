import Config from '../Config.jsx';
import Activity from '../Supers/Activity.jsx';
import InputField from '../Util/InputField.jsx';
import Icons from '../Util/Icons.jsx';

class Anagram extends Activity {

    constructor(elem, AQ) {
        super(elem, AQ);
        this._correctAnswerCount = 1;
        this.answer = this.activity.dataset.answer;
        this.iconWrapper = this.activity.querySelector(Config.ICONS);
        this.init();
    }

    init() {
        let _Question = this;
        this.numberInputField = new InputField(this.activity.querySelector('.aq-answer'), _Question);
    }

    checkAnswers() {
        this.numberInputField.deactivate();
        if (this.answer.toLowerCase() === this.numberInputField.value.toLowerCase()) {
            console.log(this.selectedCorrectAnswerCount);
            this.selectedCorrectAnswerCount ++;
            this.iconWrapper.appendChild(Icons.tick);
        } else {
            this.iconWrapper.appendChild(Icons.cross);
        }
    }

    reset() {
        this.numberInputField.reset();
        this.iconWrapper.innerHTML = '';
        super.reset();
    }

}

export default Anagram;