<?php

namespace App\Filament\Resources\ServerMonitoringResource\Widgets;

use Filament\Widgets\ChartWidget;

class ServerMonitoringChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {

        $cpu = \App\Models\ServerMonitoring::avg('cpu_usage');
        $ram = \App\Models\ServerMonitoring::avg('ram_usage');
        $disk = \App\Models\ServerMonitoring::avg('disk_usage');


/*         $data = [
            'labels' => [],
            'datasets' => [
                [
                    'label' => 'CPU Usage',
                    'data' => [],
                    'backgroundColor' => [],
                ],
                [
                    'label' => 'RAM Usage',
                    'data' => [],
                    'backgroundColor' => [],
                ],
                [
                    'label' => 'Disk Usage',
                    'data' => [],
                    'backgroundColor' => [],
                ],
            ],
        ]; */
        return [

            'labels' => ['CPU Usage', 'RAM Usage', 'Disk Usage'],
            'datasets' => [
                [
                    'label' => 'CPU Usage',
                    'data' => [$cpu],
                    'backgroundColor' => ['#FF6384'],
                ],
                [
                    'label' => 'RAM Usage',
                    'data' => [$ram],
                    'backgroundColor' => ['#36A2EB'],
                ],
                [
                    'label' => 'Disk Usage',
                    'data' => [$disk],
                    'backgroundColor' => ['#FFCE56'],
                ],
            ],

        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
