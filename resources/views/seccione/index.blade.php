@extends('layouts.app')

@section('template_title')
    Secciones
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Secciones
                            </span>

                             <div class="float-right">
                                <a href="{{ route('secciones.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                            <table class="table table-striped table-hover" id="table">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nombre</th>
										<th>Imagen</th>
										<th>Productos</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($secciones as $seccione)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $seccione->nombre }}</td>
											<td>
                                                @if ($seccione->imagen)
                                                    <a href="{{ $seccione->imagen }}" target="_blank">Ver Imagen</a>
                                                @else 
                                                    No hay
                                                @endif
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-warning " href="{{ route('producto.index',['id'=>$seccione->id, 'nombre'=>$seccione->nombre]) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver Productos') }}</a>
                                            </td>
                                            <td>
                                                <form action="{{ route('secciones.destroy',$seccione->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-success" href="{{ route('secciones.edit',$seccione->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm confirmacion"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $secciones->links() !!}
            </div>
        </div>
    </div>
@endsection
