<?php

namespace App\Models\Rebanho;

use App\Models\Rebanho\Lote;
use App\Models\Cadastro\Fornecedor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Animal extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;
    protected $table = "animais";

    protected $sexos = [
        'MACHO' => 'Macho',
        'FEMEA' => 'Fêmea',
    ];

    protected $reg_partos = [
        'NORMAL' => 'Normal',
        'MACHO DESCARTE' => 'Macho Descarte',
        'NATIMORTO/ABORTO' => 'Natimorto/Aborto',
    ];

    protected $new_crias = [
        'SIM' => 'Sim',
        'NAO' => 'Não',
    ];

    protected $paridas = [
        'SIM' => 'Sim',
        'NAO' => 'Não',
    ];

    protected $sexos_crias = [
        'MACHO' => 'Macho',
        'FEMEA' => 'Fêmea',
    ];

    protected $cat_machos = [
        'MACHOS 0 - 12 MESES' => 'Machos 0 - 12 meses',
        'MACHOS 12 - 24 MESES' => 'Machos 12 - 24 meses',
        'MACHOS ACIMA DE 24 MESES' => 'Machos acima de 24 meses',
    ];

    protected $cat_femeas = [
        'FEMEAS 0 - 12 MESES' => 'Fêmeas 0 - 12 meses',
        'FEMEAS 12 - 24 MESES' => 'Fêmeas 12 - 24 meses',
        'FEMEAS ACIMA DE 24 MESES' => 'Fêmeas acima de 24 meses',
    ];

    protected $origens = [
        'NASCIMENTO' => 'Nascimento',
        'COMPRA' => 'Compra',
        'OUTROS' => 'Outros',
    ];

    protected $sangues = [
        '1/2' => '1/2',
        '1/4' => '1/4',
        '1/8' => '1/8',
        '3/4' => '3/4',
        '3/8' => '3/8',
        '5/8' => '5/8',
        '7/8' => '7/8',
        '7/16' =>'7/16',
        '11/16' => '11/16',
        '13/16' => '13/16',
        '15/16' => '15/16',
        '31/32' => '31/32',
        'PO' => 'PO',
        'PC' => 'PC',
        'PCOC' => 'PCOC',
        'PCOD' => 'PCOD',
        'LA' => 'LA',
        'CG' => 'CG',
    ];

    protected $racas = [
        'ANGUS' => 'Aberdeen Angus',
        'ANELORADO' => 'Anelorado',
        'BRAFORD' => 'Braford',
        'BRAHMAN' => 'Brahman',
        'BRANGUS' => 'Brangus',
        'CANCHIM' => 'Canchim',
        'CARACU' => 'Caracu',
        'COMPOSTO' =>'Composto',
        'CRUZADO' => 'Cruzado de corte',
        'GIR' => 'Gir',
        'GIR LEITEIRO' => 'Gir leiteiro',
        'GIROLANDO' => 'Girolando',
        'GUZERA' => 'Guzerá',
        'GUZOLANDO' => 'PC',
        'HOLANDES' => 'Holandês',
        'HOLANDES VERMELHO' => 'Holandês Vermelho',
        'JERSEY' => 'Jersey',
        'JERSOLANDA' => 'Jersolanda',
        'NELORE' => 'Nelore',
        'NORNMANDO' => 'Normando',
        'PARDO SUICO' => 'Pardo Suíço',
        'PARDO SUICO - LEITE' => 'Pardo Suíço - Leite',
        'SENEPOL' => 'Senepol',
        'SIMENTAL' => 'Simental',
        'SIMENTAL MOCHO' => 'Simental Mocho',
        'SINDI' => 'SINDI',
        'TABAPUÃ' => 'Tbapuã',
        'TRICROSS' => 'Tricross',
        'WEST FLEMISH RER' => 'West Flemish Rer',
        'OUTROS' => 'Outros Cruzamentos',
    ];

    protected $racas_2 = [
        'ANGUS' => 'Aberdeen Angus',
        'ANELORADO' => 'Anelorado',
        'BRAFORD' => 'Braford',
        'BRAHMAN' => 'Brahman',
        'BRANGUS' => 'Brangus',
        'CANCHIM' => 'Canchim',
        'CARACU' => 'Caracu',
        'COMPOSTO' =>'Composto',
        'CRUZADO' => 'Cruzado de corte',
        'GIR' => 'Gir',
        'GIR LEITEIRO' => 'Gir leiteiro',
        'GIROLANDO' => 'Girolando',
        'GUZERA' => 'Guzerá',
        'GUZOLANDO' => 'PC',
        'HOLANDES' => 'Holandês',
        'HOLANDES VERMELHO' => 'Holandês Vermelho',
        'JERSEY' => 'Jersey',
        'JERSOLANDA' => 'Jersolanda',
        'NELORE' => 'Nelore',
        'NORNMANDO' => 'Normando',
        'PARDO SUICO' => 'Pardo Suíço',
        'PARDO SUICO - LEITE' => 'Pardo Suíço - Leite',
        'SENEPOL' => 'Senepol',
        'SIMENTAL' => 'Simental',
        'SIMENTAL MOCHO' => 'Simental Mocho',
        'SINDI' => 'SINDI',
        'TABAPUÃ' => 'Tbapuã',
        'TRICROSS' => 'Tricross',
        'WEST FLEMISH RER' => 'West Flemish Rer',
        'OUTROS' => 'Outros Cruzamentos',
    ];

    protected $racas_crias = [
        'ANGUS' => 'Aberdeen Angus',
        'ANELORADO' => 'Anelorado',
        'BRAFORD' => 'Braford',
        'BRAHMAN' => 'Brahman',
        'BRANGUS' => 'Brangus',
        'CANCHIM' => 'Canchim',
        'CARACU' => 'Caracu',
        'COMPOSTO' =>'Composto',
        'CRUZADO' => 'Cruzado de corte',
        'GIR' => 'Gir',
        'GIR LEITEIRO' => 'Gir leiteiro',
        'GIROLANDO' => 'Girolando',
        'GUZERA' => 'Guzerá',
        'GUZOLANDO' => 'PC',
        'HOLANDES' => 'Holandês',
        'HOLANDES VERMELHO' => 'Holandês Vermelho',
        'JERSEY' => 'Jersey',
        'JERSOLANDA' => 'Jersolanda',
        'NELORE' => 'Nelore',
        'NORNMANDO' => 'Normando',
        'PARDO SUICO' => 'Pardo Suíço',
        'PARDO SUICO - LEITE' => 'Pardo Suíço - Leite',
        'SENEPOL' => 'Senepol',
        'SIMENTAL' => 'Simental',
        'SIMENTAL MOCHO' => 'Simental Mocho',
        'SINDI' => 'SINDI',
        'TABAPUÃ' => 'Tbapuã',
        'TRICROSS' => 'Tricross',
        'WEST FLEMISH RER' => 'West Flemish Rer',
        'OUTROS' => 'Outros Cruzamentos',
    ];
     
    public function scopeActive($query)
    {
        return $query->where('ativo', 1);
    }

    public function scopeFiltros($query, $request)
    {
        if (isset($request->search) && $request->search != "") {
            $query->where(function ($q) use ($request) {
                $q->where('nome', 'like', "%{$request->search}%");
            });
        }

        if (isset($request->ativo) && $request->ativo != "") {
            $query->where(function ($q) use ($request) {
                $q->where('ativo', $request->ativo);
            });
        }
        
        return $query;
    }
    
    //chaves estrangeiras 
    public function lote()
    {
        return $this->belongsTo(Lote::class, 'lote_id');
    }

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class, 'fornecedor_id');
    }

    //listas
    public function getSexo()
    {
        return $this->sexos[$this->sexo];
    }

    public function getSexos()
    {
        return $this->sexos;
    }

    public function getRegParto()
    {
        return $this->reg_partos[$this->reg_parto];
    }

    public function getRegPartos()
    {
        return $this->reg_partos;
    }

    public function getNewCria()
    {
        return $this->new_crias[$this->new_cria];
    }

    public function getNewCrias()
    {
        return $this->new_crias;
    }

    public function getParida()
    {
        return $this->paridas[$this->parida];
    }

    public function getParidas()
    {
        return $this->paridas;
    }

    public function getSexoCria()
    {
        return $this->sexos_crias[$this->sexo_cria];
    }

    public function getSexosCrias()
    {
        return $this->sexos_crias;
    }


    public function getCatMacho()
    {
        return $this->cat_machos[$this->cat_macho];
    }

    public function getCatMachos()
    {
        return $this->cat_machos;
    }

    public function getCatFemea()
    {
        return $this->cat_femeas[$this->cat_femea];
    }

    public function getCatFemeas()
    {
        return $this->cat_femeas;
    }

    public function getOrigem()
    {
        return $this->origens[$this->origem];
    }

    public function getOrigens()
    {
        return $this->origens;
    }

    public function getSangue()
    {
        return $this->sangues[$this->sangue];
    }

    public function getSangues()
    {
        return $this->sangues;
    }
    
    public function getRaca()
    {
        return $this->racas[$this->raca];
    }

    public function getRacas()
    {
        return $this->racas;
    }

    public function getRacaCria()
    {
        return $this->racas_crias[$this->raca_cria];
    }

    public function getRacasCrias()
    {
        return $this->racas_crias;
    }

    public function getRaca2()
    {
        return $this->racas_2[$this->raca_2];
    }

    public function getRacas2()
    {
        return $this->racas_2;
    }


    //ativo 
    public function scopeAtivo($query)
    {
        return $query->where('ativo', 1);
    }

    //desmame
    public function scopeDesmame($query)
      {
         return $query->where('desmame', 1);
      }

}