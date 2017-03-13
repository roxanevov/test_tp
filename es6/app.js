import * as bla from "./article";

import 'whatwg-fetch';
//fetch('http://localhost:8000/')
  //  .then(function(reponse) {
    //    return reponse.text();
    //})
    //.then(function(body) {
        //console.log(body);
   // document.body.innerHTML = body
//})

let elements = Array.from(document.getElementsByClassName('btn'));
elements.forEach(element => element.addEventListener('click',btnListener));

function btnListener(event) {
    event.preventDefault();

    var url = event.currentTarget.getAttribute('href');

    function checkStatus(response) {
        if (response.status >= 200 && response.status < 300) {
            return response
        } else {
            var error = new Error(response.statusText)
            error.response = response
            throw error
        }
    }

    function parseJSON(response) {
        return response.json()
    }

    fetch(url)
        .then(checkStatus)
        .then(parseJSON)
        .then(function(data) {
            console.log('request succeeded with JSON response', data)
        }).catch(function(error) {
             console.log('request failed', error)
    })

}



