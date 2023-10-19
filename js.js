// Get the button
let mybutton = document.getElementById("button-top");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 30 || document.documentElement.scrollTop > 30) {
    // mybutton.style.display = "flex";
    mybutton.style.cursor = "pointer";
    mybutton.style.opacity = "1";
  } else {
    // mybutton.style.display = "none";

    mybutton.style.cursor = "default";
    mybutton.style.opacity = "0";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
//   document.body.scrollTop = 0;
//   document.documentElement.scrollTop = 0;
window.scrollTo({top: 0, behavior: 'smooth'});
}