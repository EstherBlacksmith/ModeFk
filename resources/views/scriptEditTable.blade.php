<script type="text/javascript">

/* 
* Modificamos los ejercicios mediante una tabla editable y llamama ajax
*/

function getCellValue(element, id, tipo) {
    var elementValue = element.getElementsByTagName('input')[0].value;

  //  var elementName = element.getElementsByTagName('input')[0].name;

    jQuery.ajax({
      url: "{{ route('ejerciciosEdicionStore')}} ",     
      method: 'post',
      data: {
         "_token": $("meta[name='csrf-token']").attr("content"),
         elemento: tipo,
         valor: elementValue,
         id: id
      },
      success: function(result){

        element.getElementsByTagName('span')[0].value = elementValue ;
   
      }});

  }

  $(document).ready(function(){
    $('#edicionEjercicios').Tabledit({
      type:'get',

      editButton: false,
      deleteButton: false,
      hideIdentifier: true,
      columns: {
        identifier: [0, 'id'],
        editable: [[1, 'nombre'], [2, 'descripcion']]
      }
  });

});
  
</script>