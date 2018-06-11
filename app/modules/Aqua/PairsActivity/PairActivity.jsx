import Activity from "../Supers/Activity.jsx";
import PairsCanvas from "./PairsCanvas.jsx";


class PairActivity extends Activity {

    constructor(elem, AQ) {
        super(elem, AQ);

        console.log(this.activity.dataset.canvas);

        this.Canvas = new PairsCanvas(this.activity.querySelector(this.activity.dataset.canvas), this.activity);
        this.init();
    }
    init(){

    }


}export default PairActivity;