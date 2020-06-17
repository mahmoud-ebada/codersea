<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['first_name', 'last_name', 'company_id', 'email', 'phone'];

    public static $rules = [
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'company_id' => 'required|exists:companies,id',
        'email' => 'nullable|email|unique:employees',
        'phone' => 'nullable|string|unique:employees'
    ];

    /**
     * Employee to Company relationship
     * Employee belongs to ine company
     */
    public function company(){
        return $this->belongsTo(\App\Company::class);
    }

    /**
     * name accessor
     */
    public function getNameAttribute(){
        return $this->first_name.' '.$this->last_name;
    }
}
