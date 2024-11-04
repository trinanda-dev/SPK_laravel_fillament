<?php

namespace App\Filament\Widgets;

use App\Models\Transaction;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $pemasukan = Transaction::incomes()->get()->sum('amount');
        $pengeluaran = Transaction::expenses()->get()->sum('amount');
        return [
            Stat::make('Total Pemasukan', $pemasukan)
                ->descriptionIcon('heroicon-m-arrow-trending-up'),
            Stat::make('Total Pengeluaran', $pengeluaran)
                ->descriptionIcon('heroicon-m-arrow-trending-down'),
            Stat::make('Selisih', $pemasukan - $pengeluaran)
                ->descriptionIcon('heroicon-m-arrow-trending-up'),
        ];
    }
}
