<?php

namespace App\Observers;

use App\Models\OrdemDeServicoServico;
use App\Models\OrdemDeServico;

class OrdemDeServicoServicoObserver
{
    /**
     * Handle the OrdemDeServicoServico "created" event.
     *
     * @param  \App\Models\OrdemDeServicoServico  $ordemDeServicoServico
     * @return void
     */
    public function created(OrdemDeServicoServico $ordemDeServicoServico)
    {
        $ordemDeServico = OrdemDeServico::findOrFail($ordemDeServico->ordem_servico_id);
        console.log($ordemDeServico->id);

        $ordemDeServico->updated([
            'total' => $ordemDeServico->total + $ordemDeServicoServico->valor
        ]);


        
    }

    /**
     * Handle the OrdemDeServicoServico "updated" event.
     *
     * @param  \App\Models\OrdemDeServicoServico  $ordemDeServicoServico
     * @return void
     */
    public function updated(OrdemDeServicoServico $ordemDeServicoServico)
    {
        //
    }

    /**
     * Handle the OrdemDeServicoServico "deleted" event.
     *
     * @param  \App\Models\OrdemDeServicoServico  $ordemDeServicoServico
     * @return void
     */
    public function deleted(OrdemDeServicoServico $ordemDeServicoServico)
    {
        //
    }

    /**
     * Handle the OrdemDeServicoServico "restored" event.
     *
     * @param  \App\Models\OrdemDeServicoServico  $ordemDeServicoServico
     * @return void
     */
    public function restored(OrdemDeServicoServico $ordemDeServicoServico)
    {
        //
    }

    /**
     * Handle the OrdemDeServicoServico "force deleted" event.
     *
     * @param  \App\Models\OrdemDeServicoServico  $ordemDeServicoServico
     * @return void
     */
    public function forceDeleted(OrdemDeServicoServico $ordemDeServicoServico)
    {
        //
    }
}
