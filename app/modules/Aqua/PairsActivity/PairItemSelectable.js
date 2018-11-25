import DragAndDrop from "../Util/DragAndDrop.jsx";
import Util from "../../../components/Util";
import Selectable from '../Supers/Selectable.jsx';

class PairItemSelectable extends Selectable {

    constructor(elem, activity) {
        super(elem, activity);
        this.position = parseInt(this.elem.dataset.sort);
        this.pairId = parseInt(this.elem.dataset.pair);
        this.correct = false;
        this.Activity.itemSelected = false;
    }

    click() {
        if (this.Activity.itemSelected) {
            if (this.selected) {
                this.deselect();
            } else {
                let dragAndDrop = new DragAndDrop({originItem: this.Activity.selectedItem, destinationItem: this});
                this.Activity.swapItems(dragAndDrop);
            }
        } else {
            this.select();
        }
    }

    select() {
        this.elem.classList.add('selected');
        this.selected = true;
        this.Activity.itemSelected = true;
        this.Activity.selectedItem = this;
    }

    deselect() {
        if (this.elem.classList.contains('selected')) {
            this.elem.classList.remove('selected');
        }
        this.selected = false;
        this.Activity.itemSelected = false;
    }

    check() {
        let index = Util.getNodeIndex(this.elem);
        let leftItem = this.Activity.leftItems[index];
        
        if (leftItem.pairId === this.pairId) {
            this.correct = true;
            this.Activity.selectedCorrectAnswerCount++;
            this.addTickIcon();
        }
        else {
            this.addCrossIcon();
        }
    }
}

export default PairItemSelectable;