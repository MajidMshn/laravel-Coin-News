let midTimer;
const images = document.getElementsByClassName("imgMain");
let dot = document.getElementsByClassName("dot");
let slideIndex = 0;

let index = -1;

window.onload = () => {

    let first = document.querySelector('#mainSlider');
      first.style.display = 'block';
    kash = document.querySelector(".kashi");

    let titleBtns = document.querySelector(".slider-header-btn");



// setInterval(()=>{},5000);


    showMiddleImg();


//preview profile picture
const imageInput  = document.getElementById('image-Input');
const imageTag = document.getElementById('profileImgInp');
if (imageInput){
    imageInput.addEventListener('change',function () {
        const file = imageInput.files[0];
        imageTag.src = URL.createObjectURL(file);
        imageTag.onload = function (){
            URL.revokeObjectURL(imageTag.src);
        }
    })

}

// end preview profile picture

//    ----------------------------------------------------------------------------------------------------
//middle-photo-slider
}



function showMiddleImg() {

    for (let ii = 0; ii < images.length; ii++) {
        images[ii].style.display = "none";

    }
    for (let j = 0; j < images.length; j++) {
        dot[j].className = dot[j].className.replace(" dotActive", " ");
    }
    if (slideIndex > images.length - 1) {
        slideIndex = 0;
    }
    if (slideIndex < 0) {
        slideIndex = images.length - 1;
    }
    images[slideIndex].style.display = "block";
    dot[slideIndex].classList.add("dotActive");
    slideIndex++;

    midTimer = setTimeout(showMiddleImg, 4000);

}



function plus(n) {
    clearTimeout(midTimer);

    slideIndex += n;

    console.log(slideIndex);
    showMiddleImg();
}

//--------------------------------------------------------------------------------------


function showImg(x, y, z) {
    let name = document.getElementById('showTitle');
    document.getElementById('photo').src = null;
    document.getElementById('photo').src = x;
    let footer = document.getElementById('photoFooter');
    footer.innerText = z;
    name.innerText = y;
}

function showHide(x, y,z) {
    document.getElementById(x).style.display = 'none';
    document.getElementById(y).style.display = 'block';
    let btns = document.getElementsByClassName("slider-header-btn");
    for (i = 0 ; i < btns.length;i++){
        btns[i].style.backgroundColor = "";
    }
   z.style.backgroundColor = "goldenrod";

}

function subFrm(x) {
    document.getElementById(x).submit();
}

function like(xxx) {

    let y = document.getElementById("like-b");
    if (xxx.name == "heart-outline") {
        xxx.name = "heart";
        xxx.style.color = "red";
            } else {
        xxx.name = "heart-outline";
    }
}

function showSidebar() {
    let x = document.getElementById('slider-navbar');
    if (x.style.display == "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}

function openAnswer(x){
    const ans = document.getElementById("answerCom");
    if (ans.style.display == "block"){
        ans.style.display = "none";
    }else{
        ans.style.display = "block";
        document.getElementById("como").value = x;
    }
}
var key = document.getElementById("keys");
// key.innerText = "";
function addKeys(){
    let inpKey = document.getElementById("inputKeys");
    let select = document.getElementById("showKeys");

    let opt = document.createElement('option');
    if (inpKey.value != null){


        opt.className = 'key-sbtns btn';
        opt.value = inpKey.value;
        opt.setAttribute('selected','True');
        opt.innerText = inpKey.value;
        select.appendChild(opt);
        key.innerText +=inpKey.value;
        inpKey.value="";
        inpKey.focus();
    }


    opt.addEventListener('click',function (){
        select.removeChild(this);
    })
}



