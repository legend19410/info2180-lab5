document.addEventListener('DOMContentLoaded', function(){
    //get the look up button
    const lookupBtn = document.getElementById('lookup');
    const lookupCitiesBtn = document.getElementById('lookup-cities');

    lookupBtn.addEventListener('click',function(event){
        const country = document.getElementById('country');
        const result = document.getElementById('result');
        let requested = country.name+"="+country.value;
        console.log(requested);

        const xhr = new XMLHttpRequest();

        // when we receive the contents from the server
        xhr.onload = function(){
            console.log(this.responseText);
            result.innerHTML = this.responseText;

        }

        xhr.open("GET", "world.php?"+requested, true);
       // xhr.setRequestHeader("content-type", 'application/x-www-form-urlencoded');
        xhr.send();
    });

    lookupCitiesBtn.addEventListener('click',function(event){
        const country = document.getElementById('country');
        const result = document.getElementById('result');
        let requested = "country="+country.value+"&context=cities";
        console.log(requested);

        const xhr = new XMLHttpRequest();

        // when we receive the contents from the server
        xhr.onload = function(){
            console.log(this.responseText);
            result.innerHTML = this.responseText;

        }

        xhr.open("GET", "world.php?"+requested, true);
       // xhr.setRequestHeader("content-type", 'application/x-www-form-urlencoded');
        xhr.send();
    });


});