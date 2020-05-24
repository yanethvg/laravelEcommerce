{!! Form::open(['url' => '/products', 'class' => 'app-form']) !!}
<div>
    {!! Form::label('title', 'Titulo del producto') !!}
    {!! Form::text('title','' ,['class' => 'form-control']) !!}
</div>
<div>
    {!! Form::label('description', 'Descripción del producto') !!}
    {!! Form::textarea('description','' ,['class' => 'form-control']) !!}
</div>
<div>
    {!! Form::label('price', 'Precio del Producto') !!}
    {!! Form::number('price',0 ,['class' => 'form-control']) !!}
</div>
<div class="mt-3">
    <input type="submit" value="Guardar" class="btn btn-primary">
</div>
{!! Form::close() !!}
