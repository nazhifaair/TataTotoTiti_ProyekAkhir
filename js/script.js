$(document).ready(function(){
  $('#menu').click(function(){
    $(this).toggleClass('fa-times');
    $('.nav-bar').toggleClass('nav-toggle');
  });
});

var next = document.getElementById('next');
var score = document.getElementById('score');
var totalScore = document.getElementById('totalScore');
var countdown = document.getElementById('countdown');
var count = 0;
var scoreCount = 0;
var setq = document.querySelectorAll('.set-q');
var rowAns = document.querySelectorAll('.set-q .row-ans input');
next.addEventListener('click',function() {
  step()
})
rowAns.forEach (function(singleRow) {
  singleRow.addEventListener('click',function() {
    setTimeout(function() {
      step();
    },500)
    var valid = this.getAttribute("valid");
    if(valid == "valid") {
      scoreCount+= 20;
      score.innerHTML = scoreCount;
      totalScore.innerHTML = scoreCount;

    }
  })
})

function step() {
  count += 1;
  for (var i = 0; i < setq.length; i++) {
    setq[i].className = 'set-q';

  }
  setq[count].className= 'set-q active';
  if(count == 5) {
    next.style.display = 'none';
  }
}