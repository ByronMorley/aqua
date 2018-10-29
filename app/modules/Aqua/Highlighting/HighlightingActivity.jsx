import Config from '../Config.jsx';
import Activity from '../Supers/Activity.jsx';

class Highlighting extends Activity {

    constructor(elem, AQ) {
        super(elem, AQ);

        this.wordCount = 0;
        this.correctWordList = JSON.parse(this.activity.dataset.words);
        this._correctAnswerCount = this.correctWordList.length;
        this.addWordButtonActive = false;
        this.wordListElement = this.wrapper.querySelector('.aq-word-list');
        this.addWordButton = this.wrapper.querySelector('.aq-add-word');

        this.init();
    }

    init() {

        let _this = this;

        this.addWordButton.addEventListener('click', function () {
            _this.addWord();
        });
        document.addEventListener("selectionchange", function () {
            _this.updateAddWordButton()
        });
    }


    updateAddWordButton() {
        if (this.getSelectionText().length > 0) {
            if (!this.addWordButtonActive) {
                this.activateButton();
            }
        } else {
            this.deactivateButton();
        }
    }

    activateButton() {
        this.addWordButtonActive = true;
        this.addWordButton.classList.remove('inactive');
    }

    deactivateButton() {
        this.addWordButtonActive = false;
        this.addWordButton.classList.add('inactive');
    }

    wordListItem(id, word) {

        let li = document.createElement('li');
        li.setAttribute('id', id);
        li.classList.add('aq-word');
        let span = document.createElement('span');
        span.innerHTML = word;
        let icon = document.createElement('i');
        icon.className = "fa fa-times aq-answer-incorrect icon";
        icon.addEventListener('click', () => {
            this.removeWord(id)
        });

        li.appendChild(span);
        li.appendChild(icon);

        return li;
    }

    addWord() {
        let word = this.getSelectionText();
        this.wordCount++;
        let id = "aq-word-" + this.wordCount;
        this.wordListElement.appendChild(this.wordListItem(id, word));
        this.checkWordCount();
    }

    removeWord(id) {
        let elem = document.getElementById(id);
        elem.remove();
        this.checkWordCount();
    }

    checkWordCount() {
        if (this.wordListElement.childElementCount > 0) {
            this.AQ.activateConfirm();
        } else {
            this.AQ.deactivateConfirm();
        }
    }

    getSelectionText() {
        var text = "";
        if (window.getSelection) {
            text = window.getSelection().toString();
        } else if (document.selection && document.selection.type != "Control") {
            text = document.selection.createRange().text;
        }
        return text.trim();
    }

    checkAnswers() {
        let children = this.wordListElement.children;
        for (let i = 0; i < children.length; i++) {
            let word = children[i].querySelector('span').innerHTML;

            if (this.correctWordList.indexOf(word.toLowerCase()) !== -1) {
                this.selectedCorrectAnswerCount++;
            }
        }
    }

    deactivateUI() {

    }

    reset() {
        this.wordListElement.innerHTML = '';
    }
}

export default Highlighting;