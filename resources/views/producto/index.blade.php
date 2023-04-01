@extends('layouts.app')

@section('template_title')
    Producto
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Producto (Sección {{ $nombre }})
                            </span>

                             <div class="float-right">
                                <a href="{{ route('secciones.index') }}" class="btn btn-light btn-sm float-right"  data-placement="left">
                                    {{ __('Atrás') }}
                                </a>
                                <a href="{{ route('productos.create',['id'=>$id, 'nombre'=>$nombre]) }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Clave</th>
										<th>Nombre</th>
										<th>Descripción</th>
										<th>Imagen</th>

                                        <th>Categorias</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productos as $producto)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $producto->clave }}</td>
											<td>{{ $producto->nombre }}</td>
											<td>{{ $producto->descripcion }}</td>
											<td>
                                                @if ($producto->imagen)
                                                    <a href="{{ $producto->imagen }}" target="_blank">Ver Imagen</a>
                                                @else 
                                                    No hay
                                                @endif
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-warning " href="{{ route('producto.cat_pro',$producto->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver Categorias') }}</a>
                                            </td>
                                            <td>
                                                <form action="{{ route('productos.destroy',$producto->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-success" href="{{ route('productos.edit',$producto->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $productos->links() !!}
            </div>
        </div>
    </div>
@endsection
