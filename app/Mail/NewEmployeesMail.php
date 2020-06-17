<?php

namespace App\Mail;

use App\Company;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;

class NewEmployeesMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    private $company;

    private $employees;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Company $company, Collection $employees)
    {
        $this->company = $company;
        $this->employees = $employees;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('hr@codersea')
                    ->markdown('emails.company.new-employees')
                    ->with([
                        'company' => $this->company,
                        'employees' => $this->employees
                    ]);
    }
}
