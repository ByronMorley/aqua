import Canvas from "../../Supers/Canvas.jsx";
import Config from "../../Config.jsx";
import CanvasItem from "./CanvasItem.jsx";

class PairsCanvas extends Canvas {

    constructor(canvas, activity) {
        super(canvas);

        this.activity = activity;
        this.activityArea = this.activity.querySelector('.aq-pair-activity-area');

        this.waypoints = [];
        this.vertices = [];
        this.pointSelected = false;
        this.frame = 1;
        super.init();
        this.init();
    }

    init() {
        let _PairsCanvas = this;
        setTimeout(function () {
            _PairsCanvas.setup();
        }, 1);
    }

    setup() {
        let _PairsCanvas = this;

        window.addEventListener('resize', function () {
            _PairsCanvas.canvas.width = _PairsCanvas.activityArea.clientWidth - 200;
        });

        this.canvas.width = this.activityArea.clientWidth - 200;
        this.canvas.height = "300";


        Array.from(this.activity.querySelectorAll(Config.CANVAS_ITEM)).map((elem) => {
            _PairsCanvas.CanvasItems.push(new CanvasItem(elem, _PairsCanvas));
        });

    }

    drawLine() {
        this.frame = 1;
        const animate = () => {
            const animId = requestAnimationFrame(animate);
            this.draw();
            if (this.frame >= this.waypoints.length - 1) {
                console.log("end animation");
                cancelAnimationFrame(animId);
            }
            this.frame++;
        };
        animate();
    }

    calcWaypoints(vertices) {
        let waypoints = [];
        for (let i = 1; i < vertices.length; i++) {
            let pt0 = vertices[i - 1];
            let pt1 = vertices[i];
            let dx = pt1.x - pt0.x;
            let dy = pt1.y - pt0.y;
            for (let j = 0; j < 100; j++) {
                let x = pt0.x + dx * j / 100;
                let y = pt0.y + dy * j / 100;
                waypoints.push({
                    x: x,
                    y: y
                });
            }
        }
        return waypoints;
    }
}

export default PairsCanvas;