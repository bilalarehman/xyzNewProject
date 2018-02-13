
</section>
</div>

<?php $app_info = $this->main_db->view('*', 'inf_app'); ?>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> <?php echo (isset($app_info[0])) ? $app_info[0]->APP_VER : ''; ?>
    </div>
    <strong>Copyright &copy; <?php echo (isset($app_info[0])) ? $app_info[0]->APP_CR : ''; ?></strong> Designed and Developed by: 
    <strong><a href="<?php echo (isset($app_info[0])) ? $app_info[0]->APP_DEV_WEB : '#'; ?>"><?php echo (isset($app_info[0])) ? $app_info[0]->APP_DEV : ''; ?></a></strong></strong>
  </footer>

</div>
<!-- ./wrapper -->

<script type="text/javascript">   

$.fn.digits = function(){ 
  return this.each(function(){ 
    $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
  })
}

var cta = $('.table-all').DataTable( {

      // Lenght Menu
      "lengthMenu": [[10, 25, 50, 100, 500, -1], [10, 25, 50, 100, 500, "All"]],

      "pageLength": 500,

      stateSave: true,

      // Code for Buttons
      dom: 'Bfrtip',
      buttons: [ 'copy', 'csv', 'excel', 'pdf', 

      { extend: 'print', title: '', exportOptions: {columns: ':visible'}}, 'colvis', 'pageLength', 

      { text: 'Reset', action: function (){ this.search( '' ).columns().search( '' ).draw(); var $select2 = $('.select2').select2(); $select2.select2("destroy"); $select2.val(''); $select2.select2(); } 
  }
  ],

      // Code for Select
      
      initComplete: function () {
        this.api().columns().every( function () {
          var column = this;
          var select = $('<select class="form-control select2" style="width:100%"><option value=""></option></select>')
          .appendTo( $(column.footer()).empty() )
          .on( 'change', function () {
            var val = $.fn.dataTable.util.escapeRegex( $(this).val() );
            column.search( val ? '^'+val+'$' : '', true, false ).draw();
          } );

          column.data().unique().sort().each( function ( d, j ) {
            if(column.search() === '^'+d+'$'){
              select.append( '<option value="'+d+'" selected="selected">'+d+'</option>' )
            } else {
              select.append( '<option value="'+d+'">'+d+'</option>' )
            }
          } );
        } );
      },

      fixedHeader: {
        header: true,
        footer: true,
      },
    } );  

cta.on('draw', function () {
  cta.columns().indexes().each( function ( idx ) {
    var select = $(cta.column( idx ).footer()).find('select');

    if ( select.val() === '' ) {
      select
      .empty()
      .append('<option value=""/>');

      cta.column(idx, {search:'applied'}).data().unique().sort().each( function ( d, j ) {
        select.append( '<option value="'+d+'">'+d+'</option>' );
      } );
    }
  } );
} ); 


console.log($.fn.dataTable.version);

var ta = $('#table-all').DataTable( {

      // Lenght Menu
      "lengthMenu": [[10, 25, 50, 100, 500, -1], [10, 25, 50, 100, 500, "All"]],

      "pageLength": 500,

      stateSave: true,

      // Code for Buttons
      dom: 'Bfrtip',
      buttons: [ 'copy', 'csv', 'excel', 'pdf', 

      { extend: 'print', title: '', exportOptions: {columns: ':visible'}}, 'colvis', 'pageLength', 

      { text: 'Reset', action: function (){ this.search( '' ).columns().search( '' ).draw(); var $select2 = $('.select2').select2(); $select2.select2("destroy"); $select2.val(''); $select2.select2(); } 
  }
  ],

      // Code for Select
      
      initComplete: function () {
        this.api().columns().every( function () {
          var column = this;
          var select = $('<select class="form-control select2" style="width:100%"><option value=""></option></select>')
          .appendTo( $(column.footer()).empty() )
          .on( 'change', function () {
            var val = $.fn.dataTable.util.escapeRegex( $(this).val() );
            column.search( val ? '^'+val+'$' : '', true, false ).draw();
          } );

          column.data().unique().sort().each( function ( d, j ) {
            if(column.search() === '^'+d+'$'){
              select.append( '<option value="'+d+'" selected="selected">'+d+'</option>' )
            } else {
              select.append( '<option value="'+d+'">'+d+'</option>' )
            }
          } );
        } );
      },

      fixedHeader: {
        header: true,
        footer: true,
      },
    } );  

ta.on('draw', function () {
  ta.columns().indexes().each( function ( idx ) {
    var select = $(ta.column( idx ).footer()).find('select');

    if ( select.val() === '' ) {
      select
      .empty()
      .append('<option value=""/>');

      ta.column(idx, {search:'applied'}).data().unique().sort().each( function ( d, j ) {
        select.append( '<option value="'+d+'">'+d+'</option>' );
      } );
    }
  } );
} ); 

// yadcf.init(ta,
//       [
//           {
//               column_number : 0,
//               filter_type: "multi_select",
//               select_type: 'select2'
//           },
//           {
//               column_number : 1,
//               filter_type: "multi_select",
//               select_type: 'select2'
//           }           
//       ],
//       {
//           cumulative_filtering: true
//       }
// );  

  $(".select2").select2({});

    var table = $('#example1').DataTable( {
        dom: 'Bfrtip',
        buttons: [ 'copy', 'csv', 'excel', 'pdf', { extend: 'print', exportOptions: {columns: ':visible'}}, 'colvis'],
      } );

    table.buttons().container().appendTo( '#example1_wrapper .col-sm-6:eq(0)' );

    // FOR CLASSES CHECK ALL 
    $('#check_all').click(function() { $('.check1').prop('checked', this.checked); });    

    //Date picker
    $('.datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });

    //Date picker
    $('#datepicker2').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });     


  $('.toggle-one').bootstrapToggle({
    on: "Yes",
    off: "No",
    onstyle: "success",
    offstyle: "danger",
    width: "100",
  });   

    //Date picker
    $('#add_start_date').datepicker({
      autoclose: true
    });

    //Date range picker
    $('#reservation').daterangepicker({
      locale: {
      format: 'DD/MM/YYYY'
    },
    });    

 $(".month_datepicker").datepicker( {
    autoclose: true,
    format: "M-yyyy",
    viewMode: "months", 
    minViewMode: "months",
    multidate: true,
    clearBtn: true,
});

$(".month_datepicker1").datepicker( {
    autoclose: true,
    format: "M-yyyy",
    viewMode: "months", 
    minViewMode: "months",
    clearBtn: true,
}); 

$('.input-month_daterange input').each(function() {
    $(this).datepicker({ autocolse: true, format: "M-yyyy", viewMode: "months", minViewMode: "months"});
});

  $(function () {
    //Add text editor
    $("#compose-textarea").wysihtml5();
  });

$(window).load(function() {
    $(".windowloader").fadeOut("slow");
})

</script>      


</body>
</html>