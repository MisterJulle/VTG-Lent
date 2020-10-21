var slider = 2;
function slide(){
setTimeout(function(){
  if(slider == 1) {
    slider++
    document.getElementById('sliderbutton').innerHTML = "Register";
    document.getElementById('slider').classList.remove("sliderleft");
    document.getElementById('slider').classList.add("sliderright");
  }
  else{
    slider--
    document.getElementById('sliderbutton').innerHTML = "Login";
    document.getElementById('slider').classList.remove("sliderright");
    document.getElementById('slider').classList.add("sliderleft");
  }
}, 200);
}
