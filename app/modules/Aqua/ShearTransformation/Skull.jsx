import Asset from '../Supers/Asset.jsx';


class Skull extends Asset {

    constructor(Canvas) {
        super(Canvas, "aqua/assets/images/Holbein_Skull.png");
    }

    draw(ctx) {
        ctx.drawImage(this.image, 0, 0, 128, 128);
    }
}

export default Skull;