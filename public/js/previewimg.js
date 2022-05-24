function previewImage() {
    const image = document.querySelector('#gambar')
    const imgPreview = document.querySelector('.img-preview')

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0])

    oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
    }

    image.value = imgPreview;
}