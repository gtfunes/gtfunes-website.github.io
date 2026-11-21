var reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

if (!reducedMotion) {
  particlesJS.load('landing', 'assets/particles.json', function() {});
}

/* Typing Text */

function TxtRotate(el, toRotate, period) {
  this.toRotate = toRotate;
  this.wrap = document.createElement('span');
  this.wrap.className = 'wrap';
  this.loopNum = 0;
  this.period = parseInt(period, 10) || 2000;
  this.txt = '';
  this.isDeleting = false;
  el.textContent = '';
  el.appendChild(this.wrap);
  this.tick();
}

TxtRotate.prototype.tick = function() {
  var fullTxt = this.toRotate[this.loopNum % this.toRotate.length];
  var length = this.txt.length + (this.isDeleting ? -1 : 1);
  var delta = 200 - Math.random() * 100;

  this.txt = fullTxt.substring(0, length);
  this.wrap.textContent = this.txt;

  if (this.isDeleting) {
    delta /= 5;
  }

  if (!this.isDeleting && this.txt === fullTxt) {
    delta = this.period;
    this.isDeleting = true;
  } else if (this.isDeleting && this.txt === '') {
    this.isDeleting = false;
    this.loopNum++;
    delta = 500;
  }

  setTimeout(this.tick.bind(this), delta);
};

var typingElement = document.getElementById('txt-rotate');

if (typingElement && !reducedMotion) {
  new TxtRotate(
    typingElement,
    [ typingElement.textContent ],
    typingElement.getAttribute('data-period')
  );
}
