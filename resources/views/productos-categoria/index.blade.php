@if (Auth::check())    
@extends('layouts.app')

@section('template_title')
    Productos Categoria
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Productos Categoria') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('productos-categorias.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Producto Id</th>
										<th>Categoria Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productosCategorias as $productosCategoria)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $productosCategoria->producto_id }}</td>
											<td>{{ $productosCategoria->categoria_id }}</td>

                                            <td>
                                                <form action="{{ route('productos-categorias.destroy',$productosCategoria->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('productos-categorias.show',$productosCategoria->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('productos-categorias.edit',$productosCategoria->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
            </div>
        </div>
    </div>
@endsection
@endif
