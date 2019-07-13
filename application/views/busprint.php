<style>
    .form-group label{
        color: #0c0c0c;
    }
    .modal-lg {
        max-width: 95%;
    }
</style>
<h3 class="text-center">Flotas y mini buses</h3>
<form>
    <div class="form-group row">
        <label for="mes" class="col-sm-1 col-form-label">Mes</label>
        <div class="col-sm-3">
            <select name="mes" class="form-control-plaintext" id="mes" required>
                <option value="">Seleccionar</option>
                <option value="1">Enero</option>
                <option value="2">Febrero</option>
                <option value="3">Marzo</option>
                <option value="4">Abril</option>
                <option value="5">Mayo</option>
                <option value="6">Junio</option>
                <option value="7">Julio</option>
                <option value="8">Agosto</option>
                <option value="9">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
        </div>
        <label for="anio" class="col-sm-1 col-form-label">Año</label>
        <div class="col-sm-3">
            <input class="form-control-plaintext" id="anio" name="anio" required placeholder="2000">
        </div>
        <div class="col-sm-3">
            <button type="submit" class=" btn-success" id="consultar"> <i class="fa fa-check-circle"></i> Consultar</button>
        </div>
    </div>
</form>
<table id="example" class="display" style="width:100%">
    <thead>
    <tr>
        <th>DESTINO</th>
        <th>FECHA</th>
        <th>HORA</th>
        <th>PIA</th>
        <th>ACTA DE COMISO</th>
        <th>TIPO DE MERCANCÍA</th>
        <th>CANTIDAD APROXIMADA</th>
        <th>UNIDAD FÍSICA</th>
        <th>TIPO DE TRANSPORTE</th>
        <th>PLACA</th>
        <th>COMISO DEL VEHÍCULO</th>
    </tr>
    </thead>
    <tbody id="contenido">
    </tbody>
</table>
<script>
    window.onload=function (e) {
        var t =  $('#example').DataTable({
            "order": [[ 2, "asc" ]],
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        $('#example tbody').on( 'click', 'tr', function () {
            //console.log($(this).attr('id'));
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                t.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        } );
        var f = new Date();
        $('#mes').val(f.getMonth()+1);
        $('#anio').val(f.getFullYear());

        function llenar(){
            t.clear().draw();
            var dato={
                'mes':$('#mes').val(),
                'anio':$('#anio').val()
            }
            //console.log($('#mes').val());
            $.ajax({
                url:'Bus/datosucoi',
                data:dato,
                type:'POST',
                success:function (e) {
                    var dato=JSON.parse(e);
                    //console.log(dato);
                    dato.forEach(function (e) {
                        t.row.add( [
                            e.destino,
                            e.fecha,
                            e.hora,
                            e.pia,
                            e.acta,
                            e.tipomercaderia,
                            e.cantidad,
                            e.unidad,
                            e.tipotransporte,
                            e.placa,
                            e.comiso,
                        ] ).node().id = e.iducoi;
                        t.draw( false );
                    });
                }
            })
        }
        llenar();
        $('#consultar').click(function (e) {
            llenar();
            e.preventDefault();
        });
    }
</script>
