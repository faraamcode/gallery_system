  </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
     <script src="js/dropzone.js"></script>
    <script src="js/jquery.js"></script>
 <script src='https://cdn.tiny.cloud/1/df5y5pzz1nwnxuzozukslb328erde5ygcjbt8ye0m3ht16f1/tinymce/5/tinymce.min.js' referrerpolicy="origin">
  </script> 
  <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Views',     <?php echo $session->count; ?>],
          ['Photos',      <?php echo Book::count_all(); ?>],
          ['users',  <?php echo user::count_all(); ?>],
          ['comments', <?php echo Comment::count_all(); ?>]
        
        ]);

        var options = {
        	legend: 'none',
          title: 'My Daily Activities',
          backgroundColor: 'transparent',
          pieSliceText: 'label'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  <script src="js/script.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
