<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DamageReport extends Model
{
    protected $table = 'damage_reports'; 

    protected $fillable = [
        'id',
        'calamities_id', 
        'report_statuses_id', 
        'farmers_id', 
        'regions_id', 
        'provinces_id', 
        'rice_crop_stages_id',
        'calamity_start', 
        'calamity_end',
        'calamity_start', 
        'initial_report_date', 
        'final_report_date', 
        'crop', 
        'num_farmers', 
        'standing_crop_area',  
        'harvest_month', 
        'total_area', 
        'totally_damaged_area', 
        'partially_damaged_area', 
        'yield_before', 
        'yield_after', 
        'yield_loss', 
        'volume', 
        'grand_total', 
        'remarks'
    ];

    public function calamities()
    {
        return $this->belongsTo(Calamity::class, 'calamities_id');
    }

    public function regions()
    {
        return $this->belongsTo(Region::class, 'regions_id');
    }

    public function provinces()
    {
        return $this->belongsTo(Province::class, 'provinces_id');
    }

    public function rice_crop_stages()
    {
        return $this->belongsTo(RiceCropStage::class, 'rice_crop_stages_id');
    }

    public function report_statuses()
    {
        return $this->belongsTo(ReportStatus::class, 'report_statuses_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'farmers_id');
    }
}
