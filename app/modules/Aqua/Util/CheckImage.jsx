const CheckImage = path =>
    new Promise(resolve => {
        const img = new Image();
        img.onload = () => resolve({path, status: 'ok'});
        img.onerror = () => resolve({path, status: 'error'});
        img.src = path;
        return img;
    });

export default CheckImage;