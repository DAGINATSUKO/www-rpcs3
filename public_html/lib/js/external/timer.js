/* Handles countdown timer logic */
CountDownTimer('12/1/2017 0:00 AM', 'timer-tx1-body');
function CountDownTimer(dt, id) {
	var end = Date.UTC(2017, 11, 1, 17, 0, 0) /* See for docs: https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date/UTC */
	var _second = 1000;
	var _minute = _second * 60;
	var _hour = _minute * 60;
	var _day = _hour * 24;
	var timer;
	function showRemaining() {
		var now = new Date();
		var offset = now.getTimezoneOffset();
		var distance = end - now - offset;
		if (distance < 0) {
			clearInterval(timer);
			document.getElementById(id).innerHTML = 'Kaboom!';
			return;
		}
		var days = Math.floor(distance / _day);
		var hours = Math.floor((distance % _day) / _hour);
		var minutes = Math.floor((distance % _hour) / _minute);
		var seconds = Math.floor((distance % _minute) / _second);
		if (String(hours).length < 2) {
			hours = 0 + String(hours);
		}
		if (String(minutes).length < 2) {
			minutes = 0 + String(minutes);
		}
		if (String(seconds).length < 2) {
			seconds = 0 + String(seconds);
		}
		var datestr = days + 'd  &nbsp ' + hours + 'h &nbsp ' + minutes + 'm &nbsp ' + seconds + 's';
		document.getElementById(id).innerHTML = datestr;
	}
	timer = setInterval(showRemaining, 1000);
}