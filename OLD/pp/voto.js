document.addEventListener("DOMContentLoaded", function(){
  const stars = document.querySelector('.ratings').children;
const ratingValue = document.querySelector('#rating-value');
let index;

for(let i=0; i<stars.length; i++){

  stars[i].addEventListener("mouseover", 
  function(){
    for(let j=0; j<stars.length; j++){
      stars[j].classList.remove("fa-star");
      stars[j].classList.add("fa-star-o");
    }
    for(let j=0; j<=i; j++){
      stars[j].classList.remove("fa-star-o");
      stars[j].classList.add("fa-star");
    }
  })


  stars[i].addEventListener("click", function(){
    ratingValue.value=i+1;
    index=i;
  })
  stars[i].addEventListener("mouseout", function(){
    for(let j=0; j<stars.length; j++){
      stars[j].classList.remove("fa-star");
      stars[j].classList.add("fa-star-o");
    }
    for(let j=0; j<=index; j++){
      stars[j].classList.remove("fa-star-o");
      stars[j].classList.add("fa-star");
    }
  })
}
});


/*
const stars = document.querySelector('.ratings').children;
const ratingValue = document.querySelector('#rating-value');
let index;

for(let i=0; i<stars.length; i++){

  stars[i].addEventListener("mouseover", 
  function(){
    for(let j=0; j<stars.length; j++){
      stars[j].classList.remove("fa-star");
      stars[j].classList.add("fa-star-o");
    }
    for(let j=0; j<=i; j++){
      stars[j].classList.remove("fa-star-o");
      stars[j].classList.add("fa-star");
    }
  })


  stars[i].addEventListener("click", function(){
    ratingValue.value=i+1;
    index=i;
  })
  stars[i].addEventListener("mouseout", function(){
    for(let j=0; j<stars.length; j++){
      stars[j].classList.remove("fa-star");
      stars[j].classList.add("fa-star-o");
    }
    for(let j=0; j<=index; j++){
      stars[j].classList.remove("fa-star-o");
      stars[j].classList.add("fa-star");
    }
  })
}
*/

/*
  function showRating(e){
    let type = e.type;
    let starValue = this.starValue;

    if(type === "click"){
      if(startValue > 1){
        output.innerHTML = starValue +"/5";
      }
    }

    stars.forEach(function(elem, ind){
      if(type === 'click'){
        if(ind < starValue){
          elem.classList.add("orange");
        }
        else{
          elem.classList.remove("orange");
        }
      }
      if(type === 'mouseover'){
        if(ind < starValue){
          elem.classList.add("yellow");
        }
        else{
          elem.classList.remove("yellow");
        }
      }

      if(type === 'mouseout'){
          elem.classList.remove("yellow");
        }
    });

  }
*/
