import Config from '../Config.jsx';
import Activity from '../Supers/Activity.jsx';
import InputField from '../Util/InputField.jsx';
import Icons from '../Util/Icons.jsx';

class NumeracyQuestion extends Activity {

    constructor(elem, AQ) {
        super(elem, AQ);

        this.iconWrapper = this.activity.querySelector(Config.ICONS);

        /*- Required -*/
        this._correctAnswerCount = 1;

        /*- Default -*/
        this.answerIsInt = true;

        this.init();
    }

    init() {
        let _Question = this;
        this.answer = this.extractAnswer();
        this.numberInputField = new InputField(this.activity.querySelector('.aq-answer'), _Question);
    }

    extractAnswer() {
        let answer = this.activity.dataset.answer;
        if (answer.includes('.')) {
            this.answerIsInt = false;
            answer = parseFloat(answer);
        } else {
            this.answerIsInt = true;
            answer = parseInt(answer);
        }
        return answer;
    }

    checkAnswers() {
        this.numberInputField.deactivate();
        let value = (this.answerIsInt) ? parseInt(this.numberInputField.value) : parseFloat(this.numberInputField.value);
        if (this.answer === value) {
            console.log(this.selectedCorrectAnswerCount);
            this.selectedCorrectAnswerCount++;
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

export default NumeracyQuestion;