let kash,page1,page2,btnPg1,btnPg2,ii = 2,jj = 0;
let timer;

window.onload = ()=>{
    document.querySelector("#page1").children[0].onmouseenter();
    document.querySelector("#page1").children[0].classList.add("activex");
    document.querySelector("#pg2").click();
    timer = setInterval(showImages,4000);

}

function showImages(){
     page1 = document.querySelector("#page1");
    page2 = document.querySelector("#page2");
     btnPg1 = document.querySelector("#pg1");
     btnPg2 = document.querySelector("#pg2");
    for (let i = 0 ; i<12;i+=2){
        page1.children[i].classList.remove("activex");
        page2.children[i].classList.remove("activex");
    }
   const first = ()=>{
        btnPg2.click();
        page1.children[ii].onmouseenter();
        page1.children[ii].classList.add("activex");
        ii +=2;
       if (ii>11){
           jj = 0;
       }
   }
    const second = ()=>{
        btnPg1.click();
        page2.children[jj].onmouseenter();
        page2.children[jj].classList.add("activex");
        jj += 2;
        if (jj>11){
            ii = 0;
        }
    }
    if (ii<11){
        first();

    }else {
        second();
    }



}

const stoper=()=>{
    clearTimeout(timer);
}
const starter=()=>{
    timer = setInterval(showImages,4000);
}
