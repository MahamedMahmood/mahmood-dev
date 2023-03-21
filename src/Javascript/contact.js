
// let kontakt = {

// Absender(kontakt) {
//     kontakt.querySelector("#myform").addEventListener("submit", e => {
//         e.preventDefault();
//         console.log(e);
//     });
// }

// }










// function kontakt (e) {


// }


// function kontakt (e) {
//     alert(e)
// //  let stn = document.createElement("section")
// //  stn.setAttribute("id", "container-x")
//  document.getElementById("container-x");

// }

// function macheWas(e) {
//     e.preventDefault();
//     console.log(e);

// }


// let button = document.getElementById("Absender-btn");
// button.addEventListener("click", e => {
//     e.preventDefault();

//     let vorname = document.getElementById("vorname");
//     console.log(vorname.value);

// } );






document.getElementById("myform").addEventListener("submit", e => {
    e.preventDefault();
    console.log(e);
    let myform = e.target;
    let formData = new FormData(myform);

    formData.append("time", Date.now());

    for( let value of formData.values()) {
        console.log(value, formData.get(value));
    }








    // let url = "http://localhost/";
    //
    // let request = new Request(url, {
    //     section: formData,
    //     methode: "post",
    // });
    //
    // fetch(request)
    //     .then((response) => response.json())
    //      .then((data) => {
    //      console.log("Antwort vom Server:", data)
    //     //    myform.reset();
    //     })
    //
    //     .catch((error) => {
    //         console.warn(error);
    //     });


});
