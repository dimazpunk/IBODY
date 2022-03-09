<script>
  
// activate collapse right menu when the windows is resized
$(window).resize(function() {
  md.initSidebarsCheck();

  // reset the seq for charts drawing animations
  seq = seq2 = 0;

  setTimeout(function() {
    md.initDashboardPageCharts();
    md.initDashboardPageCharts2();
  }, 500);
});

md = {
  misc: {
    navbar_menu_visible: 0,
    active_collapse: true,
    disabled_collapse_init: 0,
  },





  initDashboardPageCharts: function() {

    if ($('#achievementss').length != 0) {
      /* ----------==========     Daily Sales Chart initialization    ==========---------- */

      dataachievementss = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul'],
        series: [
          [10, 20, 30, 40, 30,20, 10]
        ]
      };

      optionsachievementss = {
        lineSmooth: Chartist.Interpolation.cardinal({
          tension: 0
        }),
        low: 0,
        high: 50, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
        chartPadding: {
          top: 0,
          right: 0,
          bottom: 0,
          left: 0
        },
      }

      var achievementss = new Chartist.Line('#achievementss', dataachievementss, optionsachievementss);

      md.startAnimationForLineChart(achievementss);


    }
  },

  initDashboardPageCharts2: function() {
    if ($('#averagess').length != 0) {
      /* ----------==========     Daily Sales Chart initialization    ==========---------- */

      dataaveragess = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul'],
        series: [
          [10, 20, 30, 40, 30,20, 10]
        ]
      };

      optionsaveragess = {
        lineSmooth: Chartist.Interpolation.cardinal({
          tension: 0
        }),
        low: 0,
        high: 50, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
        chartPadding: {
          top: 0,
          right: 0,
          bottom: 0,
          left: 0
        },
      }

      var averagess = new Chartist.Line('#averagess', dataaveragess, optionsaveragess);

      md.startAnimationForLineChart(averagess);


    }
  },
  

}
</script>
