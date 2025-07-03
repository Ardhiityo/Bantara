<?php

namespace App\Services;

use App\Services\Interfaces\MemberInterface;
use App\Services\Interfaces\PositionInterface;
use App\Services\Interfaces\CompetitionInterface;
use App\Services\Interfaces\MemberCompetitionInterface;

class DashboardService
{

    public function __construct(
        private MemberInterface $memberRepository,
        private PositionInterface $positionRepository,
        private CompetitionInterface $competitionRepository,
        private MemberCompetitionInterface $memberCompetitionRepository
    ) {}

    public function getPanelData()
    {
        $memberCount = $this->memberRepository->getTotal();
        $positionCount = $this->positionRepository->getTotal();
        $competitionCount = $this->competitionRepository->getTotal();
        $memberCompetitionCount = $this->memberCompetitionRepository->getTotal();
        $memberCompetitions = $this->memberCompetitionRepository->getLatest();
        $statistics = $this->memberRepository->getStatistics();

        return compact(
            'memberCount',
            'positionCount',
            'competitionCount',
            'memberCompetitionCount',
            'memberCompetitions',
            'memberCompetitions',
            'statistics'
        );
    }
};
