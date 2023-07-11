<?php

namespace App\Filament\Resources\MemberResource\Widgets;

use App\Models\Auxiliary;
use App\Models\Member;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class MemberStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $mal = Member::where('auxiliary_id', '=', 1)->count();
        $auxMembers = Member::all()->count()-$mal;
        return [
            Card::make('Total Membership', Member::all()->count()),
            Card::make('Total Active Auxiliaries', Auxiliary::all()->count()-1),
            Card::make('Total Auxiliary Members', $auxMembers),
            Card::make('Total Members at Large', $mal),
        ];
    }
}
