//countdown timer
minute = 1;
seconds = 62;
function timer() {
    if (seconds > 60) {
        document.getElementById('timer').innerHTML = minute + ":00";
        seconds--;
    } else if (seconds == 60) {
        document.getElementById('timer').innerHTML = minute + ":00";
        seconds--;
        minute--;
    } else if (seconds >= 10 && seconds < 60) {
        document.getElementById('timer').innerHTML = minute + ":" + seconds;
        seconds--;
    } else if (seconds < 10) {
        document.getElementById('timer').innerHTML = minute + ":0" + seconds;
        seconds--;
    }

    // this doesn't work!!!
    // if (seconds < 0) {
    //     setTimeout(function(){
    //         $.mobile.changePage("message.html", {
    //             transition: "slide",
    //             reverse: true
    //         })
    //     }, 0);
    //     }
    //     else { setTimeout(timer, 1000); }

    if (seconds < 0) {
    setTimeout(function(){
    window.location.href = 'message.php';
    }, 0);
    }
    else { setTimeout(timer, 1000); }
}

//count characters inside message textarea
function countChar() {
    document.getElementById('charValue').innerHTML = document.getElementById('encourageMessage').value.length + "/140";
}

var slideIndex = 0;
function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > x.length) {slideIndex = 1}
  x[slideIndex-1].style.display = "inline-block";
  setTimeout(carousel, 3000); // Change image every 2 seconds
}

var slideIndexSlow = 0;
function carouselSlow() {
  var i;
  var x = document.getElementsByClassName("mySlidesSlow");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  slideIndexSlow++;
  if (slideIndexSlow > x.length) {slideIndexSlow = 1}
  x[slideIndexSlow-1].style.display = "inline-block";
  setTimeout(carouselSlow, 5000); // Change image every 2 seconds
}

//random image generator
// function random() {
//     var randomNumber = Math.floor((Math.random()*40)+1);
//     document.getElementById("image").src="masked_faces/"+randomNumber+".jpg";
// }
