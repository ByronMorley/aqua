class ImageLoader {

    constructor() {

        this.preloadImages = new Array(10);
        this.totalImages = this.preloadImages.length;
        this.images = [];

        for (let i = 0; i < this.preloadImages.length; i++) {
            this.preloadImages[i] = "http://placehold.it/300x250?text=Image+" + i;
        }

        for (var x = 0; x < 4; x++) {
            this.preload();
        }

    }

    load(){

    }

    preload() {

        let _ImageLoader = this;

        if (this.preloadImages.length) {
            _ImageLoader.loadImage(this.preloadImages.shift()).then((img) => {
                console.log("Preload ", img);
                _ImageLoader.imageReady(img);
            })
        }
    }

    imageReady(img) {
        this.images.push(img);
        console.log("Progress", (this.images.length / this.totalImages));
        document.body.appendChild(img);
        this.preload();
    }

    loadImage(src) {
        return new Promise((resolve, reject) => {
            console.log(src);
            var img = new Image();
            img.onload = () => resolve(img);
            img.src = src;
        });
    }

}export default ImageLoader;