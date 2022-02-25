function changeBodyBg(){
    document.getElementById("background").setAttribute("id", "background_after");
    document.getElementById("test").setAttribute("id", "test_after");
    var element = document.getElementsClassName("button2"); 
    element.classList.toggle("button2_after");
}

function changeBodyBgBack(){
    document.getElementById("background").setAttribute("id", "background");
}


function changeText(){
    var element = document.getElementById("tabletext");
    element.classList.toggle("mystyle");

    var element2 = document.getElementById("tabletext2");
    element2.classList.toggle("mystyle2");

    var element3 = document.getElementById("tabletext3");
    element3.classList.toggle("mystyle3");


}

function fixVideo(){
    var element = document.getElementById("video");
    element.classList.toggle("video2");
}

function fixMp3(){
    var element = document.getElementById("lookingglass");
    element.classList.toggle("lookingglass");
}




// Function to change heading background color
// function changeHeadingBg(color){
//     document.getElementById("heading").style.background = color;
