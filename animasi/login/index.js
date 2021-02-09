setTimeout(function() {
  document.querySelector('.chick-wrapper-run').classList.add('rest');
  document.querySelector('.egg-lay').classList.add('lay');
  setTimeout(function() {
    document.querySelector('.chick-wrapper-run').classList.add('last');
    
    setTimeout(function() {
      document.querySelector('.chick-wrapper-landing').classList.add('show');
      document.querySelector('.chick-wrapper-landing.flip').classList.add('show');
      document.querySelector('.chick-wrapper-float').classList.add('show');    
    }, 2000);
  }, 2000);
}, 6800);

var landingChicks = document.querySelectorAll('.chick-wrapper-landing');
var llength = landingChicks.length;

for (var i = 0; i < llength; i++) {
  landingChicks[i].addEventListener('click', function() {
    var $this = this;
    if (!$this.classList.contains('jump')) {
      $this.classList.add('jump');
      setTimeout(function() {      
        $this.classList.remove('jump');
      }, 4000);
    }
  });
}