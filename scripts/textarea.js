function textfloat(){
  var input = document.getElementById('textarea').value;
  if(input){
    document.getElementById('label').classList.add("floating-label-textarea");
  }
  else{
    document.getElementById('label').classList.remove("floating-label-textarea");
  }
};
