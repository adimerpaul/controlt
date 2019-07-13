<h3 class="text-center">Flotas y mini buses</h3>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
    <i class="fa fa-bus"></i> Regitrar bus minibuces
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
                            <input class="form-control" type="text" id="placa" name="placa" required>
                        </div>
                        <label for="tipotransporte" class="col-sm-3 col-form-label">TIPO DE TRANSPORTE</label>
                        <div class="col-sm-3">
                            <input class="form-control" id="tipotransporte" name="tipotransporte" required>
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
                <option value="Enero">Enero</option>
                <option value="Febrero">Febrero</option>
                <option value="Marzo">Marzo</option>
                <option value="Abril">Abril</option>
                <option value="Mayo">Mayo</option>
                <option value="Junio">Junio</option>
                <option value="Julio">Julio</option>
                <option value="Agosto">Agosto</option>
                <option value="Septiembre">Septiembre</option>
                <option value="Octubre">Octubre</option>
                <option value="Noviembre">Noviembre</option>
                <option value="Diciembre">Diciembre</option>
            </select>
        </div>
        <label for="anio" class="col-sm-1 col-form-label">Año</label>
        <div class="col-sm-3">
            <input class="form-control-plaintext" id="anio" name="anio" required placeholder="2000">
        </div>
        <div class="col-sm-3">
            <button type="submit" class=" btn-success"> <i class="fa fa-check-circle"></i> Verificar</button>
        </div>
    </div>
</form>
<table id="example" class="display" style="width:100%">
    <thead>
    <tr>
        <th>Name</th>
        <th>Position</th>
        <th>Office</th>
        <th>Age</th>
        <th>Start date</th>
        <th>Salary</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Tiger Nixon</td>
        <td>System Architect</td>
        <td>Edinburgh</td>
        <td>61</td>
        <td>2011/04/25</td>
        <td>$320,800</td>
    </tr>
    </tbody>
</table>
<script>
    window.onload=function (e) {
        $(document).ready(function() {
            $('#example').DataTable();
        } );

        var f = new Date();
        var mes=['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
        //document.write(f.getDate() + "/" + (f.getMonth()) + "/" + f.getFullYear());
        $('#mes').val(mes[f.getMonth()])
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
                    }else {
                        $('#tipotransporte').val('');
                    }
                }
            })
        });
        $('#insert').submit(function (e) {
            console.log($(this).serialize());
             return false;
        });
    }
</script>
