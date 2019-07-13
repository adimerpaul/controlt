<style>
    .form-group label{
        color: #0c0c0c;
    }
    .modal-lg {
        max-width: 95%;
    }
</style>
<h3 class="text-center">Flotas y mini buses</h3>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
    <i class="fa fa-bus"></i> Regitrar bus minibuces
</button>

<button type="button" class="btn btn-danger btn-sm" id="eliminar">
    <i class="fa fa-trash"></i> Eliminar bus minibuces
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="insert">
                    <div class="form-group row">
                        <label for="iddestino" class="col-sm-2">DESTINO</label>
                        <div class="col-sm-2">
                            <select name="iddestino" class="form-control-plaintext" id="iddestino" required>
                                <option value=''>Seleccionar</option>
                                <?php
                                $query=$this->db->query("SELECT * FROM destino order by nombre");
                                foreach ($query->result() as $row){
                                    echo "<option value='$row->iddestino'>$row->nombre</option>";
                                }
                                ?>
                                <option value='OTROS'>OTROS</option>
                            </select>
                        </div>
                        <label for="pia" class="col-sm-1 col-form-label">PIA</label>
                        <div class="col-sm-2">
                            <input class="form-control" id="pia" name="pia" value="CUARTOS" required placeholder="CUARTOS">
                        </div>
                        <label for="acta" class="col-sm-2 col-form-label">ACTA DE COMISO</label>

                        <div class="col-sm-3">
                            <input class="form-control" id="acta" name="acta">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="idtipomercaderia" class="col-sm-3 col-form-label">TIPO DE MERCADERIA</label>
                        <div class="col-sm-2">
                            <select name="idtipomercaderia" class="form-control-plaintext" id="idtipomercaderia" required>
                                <option value=''>Seleccionar</option>
                                <?php
                                $query=$this->db->query("SELECT * FROM tipomercaderia order by nombre");
                                foreach ($query->result() as $row){
                                    echo "<option value='$row->idtipomercaderia'>$row->nombre</option>";
                                }
                                ?>
                                <option value='OTROS'>OTROS</option>
                            </select>
                        </div>
                        <label for="cantidad" class="col-sm-3 col-form-label">CANTIDAD APROXIMADA</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="number" id="cantidad" name="cantidad" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="placa" class="col-sm-1 col-form-label">PLACA</label>
                        <div class="col-sm-2">
                            <input type="text" id="idtransporte" name="idtransporte" hidden>
                            <input class="form-control" type="text" id="placa" name="placa" required>
                        </div>
                        <label for="tipotransporte" class="col-sm-2 col-form-label">TIPO DE TRANSPORTE</label>
                        <div class="col-sm-2">
                            <input class="form-control" id="tipotransporte" name="tipotransporte" required>
                        </div>
                        <label for="unidad" class="col-sm-2 col-form-label">UNIDAD FÍSICA</label>
                        <div class="col-sm-2">
                            <input class="form-control" id="unidad" name="unidad">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fa fa-trash"></i> Close</button>
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Save changes</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
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
        $('#eliminar').click( function () {
            if ($('.selected').attr('id')==undefined){
                alert('Primero debes seleccionar bus para eliminar');
            }else {
                if (confirm("Seguro de eliminar?")){
                    $.ajax({
                        url:'Bus/delete',
                        data:"id="+$('.selected').attr('id')+"",
                        type:'POST',
                        success:function (e) {
                            if (e=='1'){
                                toastr.error('Eliminado correctamente');
                                t.row('.selected').remove().draw( false );
                            }
                        }
                    })
                }
            }


        } );
        //document.write(f.getDate() + "/" + (f.getMonth()) + "/" + f.getFullYear());
        $('#mes').val(f.getMonth()+1);
        $('#anio').val(f.getFullYear());
        $('#placa').keyup(function (e) {
            //console.log($(this).val());
            $.ajax({
                url:'Bus/buscarbus',
                data:"placa="+String($(this).val())+"",
                type:'POST',
                success:function (e) {
                    var dato=JSON.parse(e);
                    //console.log(dato);
                    if (dato.length==1){
                        $('#tipotransporte').val(dato[0].tipotransporte);
                        $('#idtransporte').val(dato[0].idtransporte);
                    }else {
                        $('#tipotransporte').val('');
                        $('#idtransporte').val('');
                    }
                }
            })
        });

        $('#insert').submit(function (e) {
            $.ajax({
                url:'Bus/insertucoi',
                data:$(this).serialize(),
                type:'POST',
                success:function (e) {
                    var dato=JSON.parse(e);
                    if (e=='1'){
                        $('#insert')[0].reset();
                        $('#exampleModal').modal('hide');
                        toastr.success('Registrado correctamente');
                        llenar();
                    }
                }
            })
            //console.log($(this).serialize());
            return false;

        });
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
