import CanvasObject from "../../Supers/CanvasObject.jsx";

export default class CanvasItem extends CanvasObject
{
    constructor(elem, canvas, x, y, width, height) {
        super(canvas, x, y, width, height)
        this.elem = elem;
        this.text = this.elem.dataset.text;
        this.pairID = parseInt(this.elem.dataset.pair);
        this.side = this.elem.dataset.side;

        this.init()
    }

    init() {
    }

    draw(ctx) {

    }



}