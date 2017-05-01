function checkStatus(response) {

    if (response.status >= 200 && response.status < 300) {
        //console.log(response);
        return response

    } else {
        var error = new Error(response.statusText);
        error.response = response;
        throw error
    }
}

function parseJSON(response) {

    return response.json();
}

export function remove() {

    var param = event.currentTarget.getAttribute('data-id');
    //alert(param);

    fetch('http://localhost:8000/web/')

        .then(checkStatus)
        //.then(parseJSON)
        .then(function (data) {
            var article=document.getElementById(param);
            article.remove();
            console.log('request succeeded', data);

        }).catch(function (error) {
        console.log('request failed', error);
    })
}
















