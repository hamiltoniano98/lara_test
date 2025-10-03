<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;

class PerformanceComercialController extends Controller
{
    public function index(Request $request)
    {
        $tipo = $request->input('tipo', 'consultores');
        $data_inicio = $request->input('data_inicio');
        $data_fim = $request->input('data_fim');
        $seleccionados = $request->input('seleccionados', []);
        $accion = $request->input('accion', 'relatorio');

        $items = ($tipo === 'clientes')
            ? DB::table('cao_cliente')->select('co_cliente as id', 'no_fantasia as nombre')->get()
            : DB::table('permissao_sistema')
            ->join('cao_usuario', 'permissao_sistema.co_usuario', '=', 'cao_usuario.co_usuario')
            ->select('cao_usuario.co_usuario as id', 'cao_usuario.no_usuario as nombre')
            ->where('permissao_sistema.co_sistema', 1)
            ->where('permissao_sistema.in_ativo', 'S')
            ->whereIn('permissao_sistema.co_tipo_usuario', [0, 1, 2])
            ->get();

        $resultadosPorPersona = [];
        $graficoData = ['labels' => [], 'datasets' => []];
        $graficoPizza = null;
        $mesesMap = [];
        $custoTotal = 0;
        $consultoresComCusto = 0;

        if (!empty($seleccionados) && $accion !== 'cambiar_tipo' && $data_inicio && $data_fim) {
            foreach ($seleccionados as $id) {
                $query = DB::table('cao_fatura');

                if ($tipo === 'clientes') {
                    $query->join('cao_cliente', 'cao_fatura.co_cliente', '=', 'cao_cliente.co_cliente')
                        ->select(
                            DB::raw('MONTH(cao_fatura.data_emissao) as mes'),
                            DB::raw('YEAR(cao_fatura.data_emissao) as ano'),
                            'cao_cliente.no_fantasia as nombre',
                            DB::raw('SUM(cao_fatura.valor - (cao_fatura.valor * cao_fatura.total_imp_inc / 100)) AS receita_liquida'),
                            DB::raw('SUM(cao_fatura.comissao_cn) AS comissao')
                        )
                        ->where('cao_cliente.co_cliente', $id);
                } else {
                    $query->join('cao_os', 'cao_fatura.co_os', '=', 'cao_os.co_os')
                        ->join('cao_usuario', 'cao_os.co_usuario', '=', 'cao_usuario.co_usuario')
                        ->join('cao_salario', 'cao_usuario.co_usuario', '=', 'cao_salario.co_usuario')
                        ->select(
                            DB::raw('MONTH(cao_fatura.data_emissao) as mes'),
                            DB::raw('YEAR(cao_fatura.data_emissao) as ano'),
                            'cao_usuario.no_usuario as nombre',
                            DB::raw('SUM(cao_fatura.valor - (cao_fatura.valor * cao_fatura.total_imp_inc / 100)) AS receita_liquida'),
                            DB::raw('SUM(cao_fatura.comissao_cn) AS comissao'),
                            DB::raw('MAX(cao_salario.brut_salario) AS custo_fixo')
                        )
                        ->where('cao_usuario.co_usuario', $id);

                    $salario = DB::table('cao_salario')->where('co_usuario', $id)->value('brut_salario');
                    if ($salario) {
                        $custoTotal += $salario;
                        $consultoresComCusto++;
                    }
                }

                $query->whereBetween('cao_fatura.data_emissao', [$data_inicio, $data_fim])
                    ->groupBy(DB::raw('MONTH(cao_fatura.data_emissao)'), DB::raw('YEAR(cao_fatura.data_emissao)'), 'nombre');

                $registros = $query->get();

                $persona = $registros[0]->nombre ?? '—';
                $meses = [];
                $totais = ['receita_liquida' => 0, 'comissao' => 0, 'custo_fixo' => 0, 'lucro' => 0];
                $valoresGrafico = [];

                foreach ($registros as $r) {
                    $mesLabel = ucfirst(DateTime::createFromFormat('!m', $r->mes)->format('M')) . '/' . $r->ano;
                    $mesesMap[$mesLabel] = true;

                    $custo = $tipo === 'clientes' ? 0 : $r->custo_fixo;
                    $lucro = $r->receita_liquida - $r->comissao - $custo;

                    $meses[] = [
                        'periodo' => $mesLabel,
                        'receita_liquida' => $r->receita_liquida,
                        'comissao' => $r->comissao,
                        'custo_fixo' => $custo,
                        'lucro' => $lucro
                    ];

                    $totais['receita_liquida'] += $r->receita_liquida;
                    $totais['comissao'] += $r->comissao;
                    $totais['custo_fixo'] += $custo;
                    $totais['lucro'] += $lucro;

                    $valoresGrafico[$mesLabel] = $r->receita_liquida;
                }

                $resultadosPorPersona[] = [
                    'nombre' => $persona,
                    'meses' => $meses,
                    'totais' => $totais
                ];

                $graficoData['datasets'][] = [
                    'label' => $persona,
                    'data' => $valoresGrafico,
                    'backgroundColor' => '#' . substr(md5($persona), 0, 6)
                ];
            }

            $graficoData['labels'] = array_keys($mesesMap);
            sort($graficoData['labels']);

            foreach ($graficoData['datasets'] as &$ds) {
                $ds['data'] = array_map(function ($label) use ($ds) {
                    return $ds['data'][$label] ?? 0;
                }, $graficoData['labels']);
            }

            if ($tipo === 'consultores') {
                $custoFixoMedio = $consultoresComCusto > 0 ? $custoTotal / $consultoresComCusto : 0;

                $graficoData['datasets'][] = [
                    'label' => 'Custo Fixo Médio',
                    'data' => array_fill(0, count($graficoData['labels']), round($custoFixoMedio, 2)),
                    'type' => 'line',
                    'borderColor' => '#ff0000',
                    'borderWidth' => 2,
                    'fill' => false,
                    'pointRadius' => 0
                ];
            }

            if ($accion === 'pizza') {
                $receitaPorConsultor = [];

                foreach ($resultadosPorPersona as $persona) {
                    $receitaPorConsultor[$persona['nombre']] = $persona['totais']['receita_liquida'];
                }

                $graficoPizza = [
                    'labels' => array_keys($receitaPorConsultor),
                    'datasets' => [
                        [
                            'data' => array_values($receitaPorConsultor),
                            'backgroundColor' => ['#3e95cd', '#8e5ea2', '#3cba9f', '#e8c3b9', '#c45850']
                        ]
                    ]
                ];
            }
        }

        $jsonData = json_encode($graficoData);
        $jsonPizza = json_encode($graficoPizza);

        return view('performance.index', compact(
            'items',
            'tipo',
            'data_inicio',
            'data_fim',
            'seleccionados',
            'accion',
            'graficoData',
            'graficoPizza',
            'resultadosPorPersona',
            'jsonData',
            'jsonPizza'
        ));
    }
}
