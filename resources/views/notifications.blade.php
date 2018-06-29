@if ($errors->any())
    <!-- Modal -->
    <div class="modal fade" id="myModalAlertErrors" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body text-danger">
            <h4>Por favor revisa el formulario en busca de errores.</h4>
            <ul>
                @foreach($errors->all() as $error)
                    <li><h5>{{ $error }}</h5></li>
                @endforeach
            </ul>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#myModalAlertErrors').modal('show');
        });
    </script>
@endif

@if ($message = Session::get('success'))
    <!-- Modal -->
    <div class="modal fade" id="myModalAlertSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body text-success">
            <h4>{{ $message }}</h4>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#myModalAlertSuccess').modal('show');
        });
    </script>
@endif

@if ($message = Session::get('error'))
    <!-- Modal -->
    <div class="modal fade" id="myModalAlertError" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body text-danger">
            <h4>{{ $message }}</h4>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#myModalAlertError').modal('show');
        });
    </script>
@endif

@if ($message = Session::get('warning'))
    <!-- Modal -->
    <div class="modal fade" id="myModalAlertWarning" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body text-warning">
            <h4>{{ $message }}</h4>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#myModalAlertWarning').modal('show');
        });
    </script>
@endif

@if ($message = Session::get('info'))
    <!-- Modal -->
    <div class="modal fade" id="myModalAlertInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body text-info">
            <h4>{{ $message }}</h4>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#myModalAlertInfo').modal('show');
        });
    </script>
@endif