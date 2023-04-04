

document.getElementById("Newsletter").addEventListener("submit", e => {
    e.preventDefault();

    let Newsletter = e.target;
    let myFormData = new FormData (Newsletter);

    myFormData.append("time", Date.now());

    for( let key of myFormData.keys()) {
        console.log(key, myFormData.get(key));
    }



});
