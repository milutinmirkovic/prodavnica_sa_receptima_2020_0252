<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KorisnikResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'ID korisnika: ' => $this->id,
            'Ime:' => $this->Ime,
            'Prezime: ' => $this->Prezime,
            'Adresa: ' => $this->Adresa,
            'Email:' => $this->Email,
            'Broj telefona:' => $this->broj_telefona,
            // Možete dodati i druge atribute ili relacije
        ];
    }
}
