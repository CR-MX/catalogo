@extends('layouts.app')

@section('template_title')
    Diseno
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Diseño (Categoría {{ $nombre }})
                            </span>

                             <div class="float-right">
                                <a href="{{ route('categorias.index') }}" class="btn btn-light btn-sm float-right"  data-placement="left">
                                    {{ __('Atrás') }}
                                </a>
                                <a href="{{ route('disenos.create',['id'=>$id, 'nombre'=>$nombre]) }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Imagen Ligera</th>
										<th>Imagen</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($disenos as $diseno)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $diseno->clave }}</td>
											<td>
                                                @if ($diseno->imagen_ligera)
                                                <a href="{{ $diseno->imagen_ligera }}" target="_blank">Ver Imagen Ligera</a>
                                                @endif
                                            </td>
											<td>
                                                @if ($diseno->imagen)
                                                <a href="{{ $diseno->imagen }}" target="_blank">Ver Imagen</a>
                                                @endif
                                            </td>

                                            <td>
                                                <form action="{{ route('disenos.destroy',$diseno->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-success" href="{{ route('disenos.edit',$diseno->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $disenos->links() !!}
            </div>
        </div>
    </div>
@endsection
