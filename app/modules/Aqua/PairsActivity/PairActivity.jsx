import Activity from "../Supers/Activity.jsx";
import Item from "./PairItemSelectable";
import Config from "../Config.jsx";
import DragAndDrop from "../Util/DragAndDrop.jsx";

class PairActivity extends Activity {

    constructor(elem, AQ) {
        super(elem, AQ);
        this.itemSelected = false;
        this.selectedItem = null; //Item OBJ
        this.tag = 'li';
        this.leftItems = [];
        /*-- Drag and Drop --*/
        this.draggableItemIsActive = false;
        this.activeDragItem = null;
        this.hoverElement = null;
        this.hoveringOverAnElement = false;

        this.init();
    }

    defaults() {
        return {
            animate: false
        }
    }

    init() {
        let _OrderList = this;

        Array.from(this.activity.querySelectorAll('.left-pair')).map((selectable, key) => {
            this.leftItems.push({index: key, pairId: parseInt(selectable.dataset.pair), text: selectable.dataset.text})
        });

        Array.from(this.activity.querySelectorAll(Config.SELECTABLE)).map((selectable) => {
            _OrderList.Selectables.push(new Item(selectable, _OrderList));
        });

        this.setupDragAndDrop();

        this._correctAnswerCount = this.Selectables.length;
        this.AQ.activateConfirm();
    }

    setupDragAndDrop() {
        this.addDragAndDropToElement();
        this.addDropFunctionToElement();
        this.addDropFunctionToArea();
    }

    swapItems(dragAndDrop) {

        //Clone Elements
        let destinationElement = dragAndDrop.destinationElement.cloneNode(true);
        let originElement = dragAndDrop.originElement.cloneNode(true);

        //Add originElement to Destination area and replace destinationElement
        dragAndDrop.destinationArea.replaceChild(originElement, dragAndDrop.destinationElement);

        //Add destinationElement to Origin area and replace originElement
        dragAndDrop.originArea.replaceChild(destinationElement, dragAndDrop.originElement);

        //Reverse the swap and Add the Real Elements in place of the clones
        dragAndDrop.destinationArea.replaceChild(dragAndDrop.originElement, originElement);
        dragAndDrop.originArea.replaceChild(dragAndDrop.destinationElement, destinationElement);

        this.clearSelected();
    }

    addDragAndDropToElement() {

        let _this = this;

        $(this.Selectables).each(function () {
            let elem = this.elem;
            let _selectable = this;

            $(elem).draggable({
                helper: 'clone',
                start: function (event, ui) {
                    console.log('start');
                    _this.deselectAll();
                    _this.activeDragItem = _selectable;
                    $(elem).css('visibility', 'hidden');
                },
                stop: function (event, ui) {
                    console.log('end');
                    _this.activeDragItem = null;
                    $(elem).css('visibility', 'visible');
                }
            });
        });
    }

    addDropFunctionToElement() {

        let _this = this;

        $(this.Selectables).each(function () {

            let elem = this.elem;
            let _selectable = this;

            $(elem).droppable({
                over: function (event, ui) {
                    //console.log('over');
                    _this.hoveringOverAnElement = true;
                    _this.hoverElement = _selectable;
                },
                out: function (event, ui) {
                    //console.log('out');
                    _this.hoveringOverAnElement = false;
                    _this.hoverElement = null;
                },
                deactivate: function (event, ui) {
                    //console.log('deactivate');
                }
            });
        });
    };

    addDropFunctionToArea() {

        let _this = this;

        $(this.Selectables).each(function () {

            let elem = this.elem;
            let _selectable = this;

            $(elem).droppable({
                drop: function (event, ui) {
                    if (_this.hoveringOverAnElement) {
                        //console.log('hover');

                        let dragAndDrop = new DragAndDrop({originItem: _this.activeDragItem, destinationItem: _this.hoverElement});
                        _this.swapItems(dragAndDrop);
                    }
                }
            });
        });
    };

    reset() {
        this.AQ.activateConfirm();
        super.reset();
    }
}

export default PairActivity;