import 'whatwg-fetch';
import * as article from './article';


let elements = Array.from(document.getElementsByClassName('btn'));
elements.forEach(element => element.addEventListener('click',btnListener));

function btnListener(event) {
    event.preventDefault();
    article.remove();
}






