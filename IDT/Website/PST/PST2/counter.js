var countDiv = document.getElementById("countDown"),
    time = 1200,
    counter,
    countDown = setInterval(function () {

        "use strict";
        
        counter();
    
    }, 1000);

function counter() {

    "use strict";
    
    var min = Math.floor(time / 60),
        sec = time % 60;

    if (min < 10) {
        min = "0" + min;
    }
    
    if (sec < 10) {
        sec = "0" + sec;
    }
    
    if (min < 5) {
        countDiv.style.backgroundColor = "#B00";
    }
    
    if (min < 1) {
        countDiv.classList.add("timer");
    }
    
    countDiv.innerHTML = min + ":" + sec;
    
    if (time > 0) {
        time -= 1;
    } else {
        clearInterval(countDown);
        document.getElementById("test").submit(); 
    }

}

