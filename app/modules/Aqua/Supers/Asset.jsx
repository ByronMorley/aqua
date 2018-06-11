class Asset {

    constructor(Canvas, path) {
        this.Canvas = Canvas;
        this.path = path;
        this.Canvas.addAsset();

    }
    load() {
        let _Asset = this;

        this.loadImage(this.path).then((img) => {
            _Asset.image = img;
            this.Canvas.assetLoaded();
        })
    }

    loadImage(src) {
        return new Promise((resolve, reject) => {
            console.log(src);
            var img = new Image();
            img.onload = () => resolve(img);
            img.onerror = () => reject(img);
            img.src = src;
        });
    }
}

export default Asset;