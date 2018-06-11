import Activity from "../Supers/Activity.jsx";
import ShearTransformationCanvas from "./ShearTransformationCanvas.jsx";
import Config from "../Config.jsx";

class ShearTransformationActivity extends Activity {

    constructor(elem, AQ) {
        super(elem, AQ);
        this.canvas = this.activity.querySelector(this.activity.dataset.canvas);
        this.viewport = this.wrapper.querySelector(Config.VIEWPORT);
        this.Canvas = new ShearTransformationCanvas(this.canvas, this.viewport, this.activity);
        this.init();
    }
    init(){
        console.log('Shear Transformation Initialised');
    }

}export default ShearTransformationActivity;