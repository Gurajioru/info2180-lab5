window.onload=function(){
    var search = document.getElementById("lookup");
    var citySearch = document.getElementById("cityLookup");
    citySearch.addEventListener('click',handleClick2);
    search.addEventListener('click',handleClick);

}

var httpRequest = new XMLHttpRequest();
var url = "world.php";

function handleClick(e){

    e.preventDefault();
    

    var url = "world.php";
    var searched= document.getElementById("country").value;
    searched=searched.trim();
    
    var sendToPhp=url+"?country="+searched+"&context=none";
    httpRequest.onreadystatechange = getList();

    httpRequest.open('GET',sendToPhp)
    httpRequest.send();
}

function getList(){
    var resField=document.getElementById('result');
    if (httpRequest.readyState == XMLHttpRequest.DONE){
        if(httpRequest.status==200){
            var resp= httpRequest.responseText;
            resField.innerHTML=resp;
        }else{
            alert("No countries found.");
        }
    }
}

function handleClick2(e){

    e.preventDefault();
    

    var url = "world.php";
    var searched= document.getElementById("country").value;
    searched=searched.trim();
    
    var sendToPhp=url+"?country="+searched+"&context=cities";

    httpRequest.onreadystatechange = getList();

    httpRequest.open('GET',sendToPhp)
    httpRequest.send();
}