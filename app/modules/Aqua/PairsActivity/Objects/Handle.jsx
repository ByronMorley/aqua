import CanvasObject from "../Supers/CanvasObject.jsx";

export default class Handle extends CanvasObject
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
        ctx.fillRect(0, 15, 30, 10);
        ctx.beginPath();
        ctx.arc(35, 20, 10, 0, Math.PI * 2, true);
        ctx.fill();
        ctx.closePath();
        ctx.beginPath();
        ctx.arc(35, 20, 5, 0, Math.PI * 2, true);
        ctx.fillStyle="#FFF";
        ctx.fill();
    }

}