<?php

namespace App\Services;

use Illuminate\Contracts\Session\Session;

class ArmorService
{
    public function updateArmorAndTiers(Session $session, array $armorAndTiers): void
    {
//        $armorId = $armorAndTiers['armorId'];
//        $sessionArmor = $session->get("armors.{$armorId}", []);
//        if (Auth::check() && empty($sessionRequirements)) {
//            $sessionRequirements = Auth::user()->resources->pivot->pluck("id");
//        }

        $sessionArmor = [
            "minTier" => $armorAndTiers["minTier"],
            "maxTier" => $armorAndTiers["maxTier"],
        ];

        $session->put("armors.{$armorAndTiers['armorId']}", $sessionArmor);
    }
}
