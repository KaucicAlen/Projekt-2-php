
// Get the modal
let modal = document.getElementById("myModal");

let charCount = document.getElementById("charCount");

// Get the button that opens the modal
let btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
let span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
if(btn != null){
    btn.onclick = function() {
        modal.style.display = "block";
      }
} 

if(span != null){
    // When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
  }
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}


let descriptionArea = document.getElementById("description");
if(descriptionArea != null){
    descriptionArea.addEventListener("input", event => {
        console.log("nekaj se spreminja");
        let target = event.currentTarget;
        let maxLength = target.getAttribute("maxlength");
        let currentLength = target.value.length;
    
        if (currentLength >= maxLength) {
            return charCount.innerHTML = ("You have reached the maximum number of characters.");
        }
        
        charCount.innerHTML = (`${maxLength - currentLength} characters left`);
    })
}

let logout = document.getElementById("logout");
if(logout != null){
    logout.onclick = function(){
        window.location.href = "logout.php";
    }
}

let modal1 = document.getElementById("previewPickModal");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

function showModalPreview(me){
  modal1.style.display = "block";
  modalImg.src = me.src;
  captionText.innerHTML = me.alt;
}

// Get the <span> element that closes the modal
var span1 = document.getElementsByClassName("close1")[0];

// When the user clicks on <span> (x), close the modal
if(span1 != null){  
    span1.onclick = function() { 
    modal1.style.display = "none";
    }
}


window.onclick = function(event) {
    if (event.target == modal1) {
      modal1.style.display = "none";
    }
  }