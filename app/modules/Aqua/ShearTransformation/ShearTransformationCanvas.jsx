import Canvas from '../Supers/Canvas.jsx';
import Skull from './Skull.jsx';


class ShearTransformationCanvas extends Canvas {

    constructor(canvas, viewport, activity) {
        super(canvas, viewport);
        super.init();
        this.sx = 0;
        this.sy = 0;
        this.top = 3;
        this.bottom = 0;
        this.init();
    }

    init() {

        let _Canvas = this;

        /*-- Setup Range Slider --*/
        let slider = document.getElementById("aq-range-x");

        slider.addEventListener("input", (event) => {
            _Canvas.sx = event.target.value / 100 * _Canvas.top;
            _Canvas.draw(_Canvas._context);
        });

        let x = 64 * this.factorX;
        let y = (this.originalHeight - 64) * this.factorY;

        //slider.style.left = x + "px";
        //slider.style.top = y + "px";

        /*-- Setup Skull --*/
        this.skull = new Skull(this);
        this.skull.load();

    }

    drawBoard(ctx) {
        var bw = 960;
        let bh = 540;
        //padding around grid
        let p = 0;

        let width = 32;
        let height = width;

        //size of canvas
        let cw = bw + (p * 2) + 1;
        let ch = bh + (p * 2) + 1;
        for (let x = 0; x <= bw; x += width) {
            ctx.moveTo(0.5 + x + p, p);
            ctx.lineTo(0.5 + x + p, bh + p);
        }
        for (let x = 0; x <= bh; x += height) {
            ctx.moveTo(p, 0.5 + x + p);
            ctx.lineTo(bw + p, 0.5 + x + p);
        }
        ctx.strokeStyle = '#ccc';
        ctx.stroke();
    }

    draw(ctx) {

        ctx.clearRect(0, 0, this.originalWidth, this.originalHeight);
        this.drawBoard(ctx);
        ctx.save();
        ctx.transform(1, this.sy, this.sx, 1, 0, 0);
        this.skull.draw(ctx);
        ctx.restore();
    }
}

export default ShearTransformationCanvas;