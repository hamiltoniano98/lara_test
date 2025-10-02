@extends('layouts.app')
@vite(['resources/js/app.js'])
@section('title', 'Performance Comercial')

@section('content')
<h2 class="mb-4 text-center">Performance Comercial</h2>

<form method="GET" action="{{ route('performance.index') }}">
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <label for="tipo" class="form-label">Tipo</label>
            <select name="tipo" id="tipo" class="form-select">
                <option value="consultores" {{ $tipo == 'consultores' ? 'selected' : '' }}>Consultores</option>
                <option value="clientes" {{ $tipo == 'clientes' ? 'selected' : '' }}>Clientes</option>
            </select>
        </div>
        <div class="col-md-3">
            <label for="data_inicio" class="form-label">Desde</label>
            <input type="date" name="data_inicio" id="data_inicio" class="form-control" value="{{ $data_inicio ?? '' }}">
        </div>
        <div class="col-md-3">
            <label for="data_fim" class="form-label">Hasta</label>
            <input type="date" name="data_fim" id="data_fim" class="form-control" value="{{ $data_fim ?? '' }}">
        </div>
        <div class="col-md-3 d-flex align-items-end justify-content-end">
            <button type="submit" name="accion" value="cambiar_tipo" class="btn btn-secondary me-2">Actualizar Tipo</button>
            <button type="submit" name="accion" value="relatorio" class="btn btn-primary me-2">Relatório</button>
            <button type="submit" name="accion" value="grafico" class="btn btn-success">Gráfico</button>
            <button type="submit" name="accion" value="pizza" class="btn btn-warning ms-2">Pizza</button>

        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-5">
            <label class="form-label">Disponibles</label>
            <select multiple class="form-select" id="disponibles">
                @foreach ($items as $item)
                @if (!in_array($item->id, $seleccionados ?? []))
                <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                @endif
                @endforeach
            </select>
        </div>

        <div class="col-md-2 d-flex flex-column justify-content-center align-items-center">
            <button type="button" class="btn btn-outline-primary mb-2" onclick="mover('disponibles', 'seleccionados')">→</button>
            <button type="button" class="btn btn-outline-danger" onclick="mover('seleccionados', 'disponibles')">←</button>
        </div>

        <div class="col-md-5">
            <label class="form-label">Seleccionados</label>
            <select multiple class="form-select" name="seleccionados[]" id="seleccionados">
                @foreach ($items as $item)
                @if (in_array($item->id, $seleccionados ?? []))
                <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                @endif
                @endforeach
            </select>
        </div>
    </div>
</form>

@if($resultadosPorPersona ?? false)
@foreach ($resultadosPorPersona as $persona)
<div class="card mb-4">
    <div class="card-header bg-dark text-white">
        {{ $persona['nombre'] }}
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Período</th>
                    <th>Receita Líquida</th>
                    <th>Custo Fixo</th>
                    <th>Comissão</th>
                    <th>Lucro</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($persona['meses'] as $mes)
                <tr>
                    <td>{{ $mes['periodo'] }}</td>
                    <td>R$ {{ number_format($mes['receita_liquida'], 2, ',', '.') }}</td>
                    <td>R$ -{{ number_format($mes['custo_fixo'], 2, ',', '.') }}</td>
                    <td>R$ -{{ number_format($mes['comissao'], 2, ',', '.') }}</td>
                    <td>R$ {{ number_format($mes['lucro'], 2, ',', '.') }}</td>
                </tr>
                @endforeach
                <tr class="table-light fw-bold">
                    <td>SALDO</td>
                    <td>R$ {{ number_format($persona['totais']['receita_liquida'], 2, ',', '.') }}</td>
                    <td>R$ -{{ number_format($persona['totais']['custo_fixo'], 2, ',', '.') }}</td>
                    <td>R$ -{{ number_format($persona['totais']['comissao'], 2, ',', '.') }}</td>
                    <td>R$ {{ number_format($persona['totais']['lucro'], 2, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div id="contenedor" data-mensaje="{{ $jsonData }}"></div>
<div id="contenedor-pizza" data-mensaje="{{ $jsonPizza }}"></div>



@endforeach
@endif
@if($accion === 'grafico' && count($graficoData['datasets']))
<h4 class="mt-5">Gráfico de Receita Líquida de {{ $data_inicio }} a {{ $data_fim }}</h4>
<canvas id="graficoMultiplo" height="120"></canvas>
<script>
    var mensaje = document.getElementById('contenedor').dataset.mensaje;
</script>

<script>
    var data = JSON.parse(mensaje)
    window.graficoLabels = data.labels;
    window.graficoDatasets = data.datasets;
</script>

@endif

@if($accion === 'pizza' && count($graficoPizza['datasets'][0]['data']))
<h4 class="mt-5">Distribución de Receita Líquida por Consultor</h4>
<canvas id="graficoPizza" height="120"></canvas>
<script>
    var mensajePizza = document.getElementById('contenedor-pizza').dataset.mensaje;
    var pizzaData = JSON.parse(mensajePizza);
    window.graficoPizzaData = pizzaData;
</script>
@endif




<script>
    function mover(origenId, destinoId) {
        const origen = document.getElementById(origenId);
        const destino = document.getElementById(destinoId);
        Array.from(origen.selectedOptions).forEach(option => {
            destino.appendChild(option.cloneNode(true));
            origen.removeChild(option);
        });
    }
</script>
@endsection