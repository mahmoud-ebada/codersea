<?php

namespace App;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;

class Company extends Model
{
    use Notifiable;
    
    protected $fillable = ['name', 'email', 'logo', 'website', 'address'];

    public static $rules = [
        'name' => 'required|string',
        'email' => 'nullable|email|unique:companies',
        'website' => 'nullable|url',
        'logo' => 'nullable|dimensions:min_width=100,min_height=100'
    ];

    /**
     * Delete relations
     */
    protected static function boot(){
        parent::boot();
        static::deleting(function($company) {
            
            // delete company's image
            if(Storage::exists($company->logo)){
                Storage::delete($company->logo);
            }
            // delete company's employees
            $company->employees()->delete();
       });
    }

    /**
     * Comapany to Employee relationship
     * Comapany has many employees
     */
    public function employees(){
        return $this->hasMany(Employee::class);
    }

    /**
     * New Entered employees
     */
    public function newEmployees(){
        $now = \Carbon\Carbon::now();
        $last_week = \Carbon\Carbon::now()->subWeek();

        return $this->hasMany(Employee::class)->whereBetween('created_at',[$last_week, $now]);
    }
}
