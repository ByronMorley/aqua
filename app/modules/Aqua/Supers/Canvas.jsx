import Mouse from "./Mouse.jsx";


class Canvas {

    constructor(canvas, viewport) {
        this.canvas = canvas;
        this.viewport = viewport;
        this._context = this.canvas.getContext('2d');

        this.aspectRatio = 0.6777;
        this.canvas.width = 960;
        this.canvas.height = 640;
        this.originalWidth = this.canvas.width;
        this.originalHeight = this.canvas.height;

        this.assets = 0;
        this.assetsLoaded = 0;
        this.CanvasObjects = [];
        this.mouse = new Mouse(this);

    }

    init() {

        let _Canvas = this;

        _Canvas.resize();

        window.addEventListener('resize', function () {
            _Canvas.resize();
            _Canvas.draw(_Canvas._context);
        });
    }

    readyState() {
        this.removeLoadingScreen();
        this.draw(this._context);
    }

    removeLoadingScreen() {
        let overlay = document.querySelector(".aq-loading-overlay");
        overlay.style.display = 'none';
    }

    resize() {

        this.canvas.width = this.viewport.clientWidth;
        this.canvas.height = this.canvas.width * this.aspectRatio;
        this.viewport.style.height = this.canvas.height + "px";

        this.factorX = this.canvas.width / this.originalWidth;
        this.factorY = this.canvas.height / this.originalHeight;

        this._context.scale(this.factorX, this.factorY);
    }

    addAsset() {
        this.assets++;
    }

    assetLoaded() {
        this.assetsLoaded++;
        this.checkAssets();
    }

    checkAssets() {
        if (this.assets === this.assetsLoaded) {
            this.readyState();
        }
    }

    get context() {
        return this._context;
    }
}

export default Canvas;