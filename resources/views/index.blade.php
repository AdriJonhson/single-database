<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>

        <h1>Usuários</h1>

        <table class="table">
            <thead>
                <tr>
                    <td>Nome</td>
                    <td>E-Mail</td>
                    <td>Editar</td>
                    <td>Remover</td>
                </tr>
            </thead>
            
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{!! $user->name !!}</td>
                        <td>{!! $user->email !!}</td>
                        <td><a href="{!! route('edit', [request()->tenant, $user->id]) !!}">Editar</a></td>
                        <td><a href="{!! route('delete', [request()->tenant, $user->id]) !!}">Remover</a></td>
                    </tr>
                @empty
                    <tr>
                        <td>Nenhum Usuário encontrado</td>
                    </tr>
                @endforelse
            </tbody>

            <tfoot>
                <tr>
                    <td colspan="4"><a href="#" data-toggle="modal" data-target="#exampleModal">Novo Usuário</a></td>
                </tr> 
            </tfoot>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                    <div class="modal-body">
                        <form action="{!! route('store', request()->tenant) !!}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" placeholder="Nome" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" placeholder="E-Mail" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" placeholder="Senha" class="form-control">
                            </div>
                    </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <form action="{!! route('upload', request()->tenant) !!}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="form-group">
                <input type="file" name="file">
                <button class="btn btn-success">Enviar</button>
            </div>
        </form>

        <h1>Imagens</h1>

        @forelse($images as $image)
            <img src="{!! $image->media->path . $image->media->filename !!}" width="150" height="150">
        @empty
        @endforelse

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
