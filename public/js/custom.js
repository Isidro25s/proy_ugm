function preview(event, destination) {
    if (event.target.files.length > 0) {
        let dataBytes = URL.createObjectURL(event.target.files[0]);
        let prev = document.getElementById(destination);
        prev.src = dataBytes;
        prev.style.display = "block";
    }
}

const validateSize = (fileId, maxSize) => {
    let size = document.getElementById(fileId).files[0].size;
    return (size <= maxSize);
}

const validateType = (fileId, ...fileTypes) => {
    const NOT_FOUND = -1;
    let type = document.getElementById(fileId).files[0].type;
    const upperCased = fileTypes.map(it => it.toUpperCase());
    return (upperCased.indexOf(type.toUpperCase()) !== NOT_FOUND);
}
function validateData() {
    let isValidFoto = validateSize('foto', 2048 * 1024);
    let isValidPerfil = validateSize('perfil', 2048 * 1024);

    if (!isValidFoto) {
        alert("El tamaño de la foto debe ser menor a 2MB");
    }
    if (!isValidPerfil) {
        alert("El tamaño del perfil debe ser menor a 2MB");
    }
    return isValidFoto && isValidPerfil;
}
