
class Mouse {

    constructor(Canvas){
        this.Canvas = Canvas;
        this.canvas = Canvas.canvas;

        let _Mouse = this;

        this.canvas.addEventListener('click', (event) => {
            _Mouse.click(event);
        });

        this.canvas.addEventListener('dblclick', (event) => {
            _Mouse.dblclick(event);
        });

        this.canvas.addEventListener('mouseup', (event) => {
            _Mouse.mouseup(event);
        });

        this.canvas.addEventListener('mouseover', (event) => {
            _Mouse.mouseover(event);
        });

        this.canvas.addEventListener('mouseout', (event) => {
            _Mouse.mouseout(event);
        });

        this.canvas.addEventListener('mousemove', (event) => {
            _Mouse.mousemove(event);
        });
    }

    click(event) {
        //console.log('click');
    }

    dblclick(event) {
       // console.log('dblclick');
    }

    mouseup(event) {
    //    console.log('mouseup');
    }

    mouseover(event) {
       //console.log('mouseover');
    }

    mouseout(event) {
       // console.log('mouseout');
    }

    mousemove(event) {
        //console.log('mousemove');
    }

    getMousePos(canvas, evt) {
        let rect = canvas.getBoundingClientRect();
        return {
            x: evt.clientX - rect.left,
            y: evt.clientY - rect.top
        };
    }

}
export default Mouse;