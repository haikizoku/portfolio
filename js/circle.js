jQuery("#circle1").radialProgress("init", {
  'size': 100,
  'fill': 7
}).radialProgress("to", {'perc': 70, 'time': 1400});

jQuery("#circle2").radialProgress("init", {
  'size': 100,
  'fill': 7
}).radialProgress("to", {'perc': 50, 'time': 1400});

jQuery("#circle3").radialProgress("init", {
  'size': 100,
  'fill': 7
}).radialProgress("to", {'perc': 50, 'time': 1400});

jQuery("#circle4").radialProgress("init", {
  'size': 100,
  'fill': 7
}).radialProgress("to", {'perc': 55, 'time': 1400});

jQuery("#circle5").radialProgress("init", {
  'size': 100,
  'fill': 7
}).radialProgress("to", {'perc': 60, 'time': 1400});

jQuery("#circle6").radialProgress("init", {
  'size': 100,
  'fill': 7
}).radialProgress("to", {'perc': 60, 'time': 1400});
jQuery("#circle7").radialProgress("init", {
  'size': 100,
  'fill': 7
}).radialProgress("to", {'perc': 70, 'time': 1400});

jQuery("#circle8").radialProgress("init", {
  'size': 100,
  'fill': 7
}).radialProgress("to", {'perc': 60, 'time': 1400});

jQuery("#circle9").radialProgress("init", {
  'size': 100,
  'fill': 7
}).radialProgress("to", {'perc':70, 'time': 1400});




var startClock = function() {
  var dh, dm, ds;
  setInterval(function() {
    var date = new Date(),
        h = date.getHours() % 12,
        m = date.getMinutes(),
        s = date.getSeconds();
    if (dh !== h) { clock.radialMultiProgress("to", {
      "index": 0, 'perc': h, 'time': (h ? 100 : 10)
    }); dh = h; }
    if (dm !== m) { clock.radialMultiProgress("to", {
      "index": 1, 'perc': m, 'time': (m ? 100 : 10)
    }); dm = m; }
    if (ds !== s) { clock.radialMultiProgress("to", {
      "index": 2, 'perc': s, 'time': (s ? 100 : 10)
    }); ds = s; }
  }, 1000);
};

startClock();
