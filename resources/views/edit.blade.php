<form action="{!! route('update', [request()->tenant, $user->id]) !!}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <input type="text" name="name" placeholder="Nome" class="form-control" value="{!! $user->name !!}">
    </div>
    <div class="form-group">
        <input type="text" name="email" placeholder="E-Mail" class="form-control" value="{!! $user->email !!}">
    </div>

    <button class="btn btn-primary">Save changes</button>
</form>
